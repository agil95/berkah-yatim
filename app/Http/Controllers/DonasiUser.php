<?php

namespace App\Http\Controllers;

use App\Notifications\InvoiceNotifcation;
use App\Notifications\ZakatNotifcation;
use App\Notifications\SendGridNotifcation;
use App\Proker;
use App\User;
use App\Donasi;
use App\Logs;
use App\Events\DonationCreated;
use App\Rekening;
use Carbon\Carbon;
use Exception;
use GuzzleHttp;
use GuzzleHttp\Client;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Ramsey\Uuid\Uuid;
use Veritrans_Config;
use Veritrans_Notification;
use Veritrans_Snap;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class DonasiUser extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth', 'verified']);
        //$this->middleware(['auth']);
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function getStatus($id)
    {
        try {

            DB::beginTransaction();

            $donasi = \App\Donasi::where('ref', $id)->first();
            if ($donasi) {

                $client = new GuzzleHttp\Client(['base_uri' => 'https://api.sandbox.midtrans.com/v2/']);
                $headers = [
                    'Authorization' => 'Basic U0ItTWlkLXNlcnZlci1yX2s3Tl9XS0FLSHRnZnd4U0ZMa2cwT3M6',
                    'Accept'        => 'application/json',
                ];
                $response = $client->request('GET', '' . $donasi->invoice . '/status', [
                    'headers' => $headers
                ]);
                $data = json_decode($response->getBody(), true);

                if ($data['status_code'] != '404') {
                    $donasi->status = $data['transaction_status'];
                    $donasi->save();
                    DB::commit();
                    $res['transaction_status'] = $data['transaction_status'];
                    if (isset($data['va_numbers']))
                        $res['va_number'] = $data['va_numbers'][0]['va_number'];
                    else
                        $res['merchant_id'] = $data['merchant_id'];
                    $res['payment_type'] = $data['payment_type'];
                    $res['ref'] = $donasi->ref;
                    return $res;
                } else {
                    $res['status'] = $donasi->status;
                    $res['ref'] = $donasi->ref;
                    return $res;
                }
            } else {
                $res['status'] = 'transaksi not found';
                $res['ref'] = '';
                return $res;
            }
        } catch (\Exception $e) {
            DB::rollback();
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
        }
    }


    public function notificationHandler(Request $request)
    {
        try {

            DB::beginTransaction();

            $notif =  $request->all();

            $transaction = $notif['transaction_status'];
            $type = $notif['payment_type'];
            $orderId = $notif['order_id'];
            $va_number = null;
            if (isset($notif['va_numbers']))
                $va_number = $notif['va_numbers'][0]['va_number'];
            else
                $va_number = $notif['merchant_id'];
            $donasi = Donasi::where('invoice', $orderId)->first();

            if ($donasi) {
                if ($va_number) {
                    $donasi->no_rekening = $va_number;
                    $donasi->save();
                }
                $firstDonation = false;

                $log = new Logs;
                $log->name = "callback midtrans";
                $log->content = json_encode($notif);
                $log->created_at = Carbon::now();
                $log->no = $donasi->invoice;
                $log->created_by = $donasi->email;
                $log->save();

                $donasi->updated_at = date("Y-m-d H:i:s");

                if ($transaction == 'capture') {

                    // For credit card transaction, we need to check whether transaction is challenge by FDS or not
                    if ($type == 'credit_card') {

                        $fraud = $notif['fraud_status'];

                        if ($fraud == 'challenge') {
                            // TODO set payment status in merchant's database to 'Challenge by FDS'
                            // TODO merchant should decide whether this transaction is authorized or not in MAP
                            // $donasi->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                            $donasi->setPending();
                        } else {
                            // TODO set payment status in merchant's database to 'Success'
                            // $donasi->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                            $donasi->setSuccess();
                        }
                    }
                } elseif ($transaction == 'settlement') {

                    // TODO set payment status in merchant's database to 'Settlement'
                    // $donasi->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);

                    $donasi->setSuccess();
                } elseif ($transaction == 'pending') {

                    $count = Donasi::where('email', $donasi->email)
                        ->where('status', 'success')
                        ->count();

                    if ($count == 0) $firstDonation = true;

                    // TODO set payment status in merchant's database to 'Pending'
                    // $donasi->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
                    $donasi->setPending();
                } elseif ($transaction == 'deny') {

                    // TODO set payment status in merchant's database to 'Failed'
                    // $donasi->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
                    $donasi->setFailed();
                } elseif ($transaction == 'expire') {

                    // TODO set payment status in merchant's database to 'expire'
                    // $donasi->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
                    $donasi->setExpired();
                } elseif ($transaction == 'cancel') {

                    // TODO set payment status in merchant's database to 'Failed'
                    // $donasi->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
                    $donasi->setFailed();
                }
                //$donasi->notify(new InvoiceNotifcation($donasi, "wa"));
                if ($donasi->nohp != "")
                    $donasi->notify(new InvoiceNotifcation($donasi, "wa", $firstDonation));
                else if ($donasi->email)
                    $donasi->notify(new InvoiceNotifcation($donasi, null, $firstDonation));

                DB::commit();

                return response()->json([
                    'status' => true,
                    'message' => $transaction
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "transaction id " . $orderId . " not found"
                ], 404);
            }
        } catch (\Exception $e) {
            DB::rollback();
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            return response()->json([
                'status' => false,
                'message' => $message,
            ], 500);
        }
    }


    public function notificationKitaBisa(Request $request)
    {
        try {

            DB::beginTransaction();

            $log = new Logs;
            $log->name = "prosess callback kitabisa";
            $log->content = json_encode($request->all());
            $log->created_at = date("Y-m-d H:i:s");
            $log->no = $request->trx_id;
            $log->created_by = "";
            $log->save();

            DB::commit();


            $donasi = Donasi::where('invoice', $request->trx_id)->first();

            if ($donasi) {
                $donasi->reff_id = $request->reff_id;
                $donasi->bank_reff_id = $request->bank_reff_id;
                $donasi->unique_code = $request->unique_code;
                $donasi->updated_at = date("Y-m-d H:i:s");
                if ($request->status['desc'] == 'PAID')
                    $donasi->setSuccess();
                else
                    $donasi->status = strtolower($request->status['desc']);
                $donasi->save();

                if ($donasi->email != "")
                    $donasi->notify(new ZakatNotifcation($donasi));
                else if ($donasi->nohp != "")
                    $donasi->notify(new ZakatNotifcation($donasi, 'wa'));


                $log = new Logs;
                $log->name = "callback kitabisa";
                $log->content = json_encode($request->all());
                $log->created_at = date("Y-m-d H:i:s");
                $log->no = $donasi->invoice;
                if ($donasi->email != "")
                    $log->created_by = $donasi->email;
                else
                    $log->created_by = $donasi->nohp;
                $log->save();

                DB::commit();

                return response()->json([
                    'status' => true,
                    'response_code' => '000000',
                    'message' => $donasi
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'response_code' => '000001',
                    'message' => "transaction id " . $request->trx_id . " not found"
                ], 404);
            }
        } catch (\Exception $e) {
            DB::rollback();
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            return response()->json([
                'status' => false,
                'message' => $message,
            ], 500);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($donasi = null)
    {
        return view('viewpublic.pembayaran', ['donasi' => $donasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($url)
    {
        $proker = Proker::where('url', $url)->first();
        if (!$proker) {
            return abort(404, 'Campaign tidak ditemukan');
        }
        $rekenings = Rekening::where('tipe', 'transfer_manual')->where('status', 1)->get();
        $vas = Rekening::where('tipe', 'payment_gateway')->where('status', 1)->get();
        $instans = Rekening::where('tipe', 'instant_payment')->where('status', 1)->get();

        $latestDonation = Donasi::latest()->first();
        $invoice = $this->generateNumber($latestDonation);
        if ($proker)
            $url = $proker['url'];


        return view('viewpublic.donasi', ['invoice' => $invoice, 'instans' => $instans, 'url' => $url, 'vas' => $vas, 'rekenings' => $rekenings]);
    }

    function generateNumber($row)
    {
        $number = rand(0, 999999999);
        $number = str_pad($number, 4, 0, STR_PAD_LEFT);
        return $number;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pembayaran(Request $request, $ref = null)
    {
        try {

            $ref = $request->query('ref');
            $donasi = \App\Donasi::with('rek')->with('prokers')->where('ref', $ref)->first();
            if (!$donasi) {
                return abort(404, 'Donasi tidak ditemukan');
            }

            return view('viewpublic.pembayaran', ['donasi' => $donasi, 'ref' => $ref]);
        } catch (\Exception $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort(500, $message);
        } catch (\Illuminate\Database\QueryException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort($e->getCode(), $message);
        } catch (\PDOException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort($e->getCode(), $message);
        }
    }

    public function pembayaranZakat(Request $request, $ref = null)
    {
        try {

            $ref = $request->query('ref');
            $donasi = \App\Donasi::with('rek')->with('prokers')->where('ref', $ref)->first();
            if (!$donasi) {
                return abort(404, 'Donasi tidak ditemukan');
            }

            return view('viewpublic.pembayaran-zakat', ['donasi' => $donasi, 'ref' => $ref]);
            
        } catch (\Exception $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort(500, $message);
        } catch (\Illuminate\Database\QueryException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort($e->getCode(), $message);
        } catch (\PDOException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort($e->getCode(), $message);
        }
    }

    public function summary(Request $request, $ref = null)
    {
        try {

            // $id = $request->query('donasi');
            $ref = $request->query('ref');
            $donasi = Donasi::with('rek')->with('prokers')
                ->where('ref', $ref)
                ->first();

            if (!$donasi) {
                return abort(404, 'Donasi tidak ditemukan');
            }
            $zakat = Proker::with('fundriser')->with('kategori')
                ->where('target_date', '>', now())
                ->where('status', 1)->first();

            return view('viewpublic.summary', ['donasi' => $donasi, 'zakat' => $zakat, 'ref' => $ref]);
        } catch (\Exception $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort(500, $message);
        } catch (\Illuminate\Database\QueryException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort($e->getCode(), $message);
        } catch (\PDOException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort($e->getCode(), $message);
        }
    }

    public function summaryZakat(Request $request, $ref = null)
    {
        try {

            $ref = $request->query('ref');
            $donasi = Donasi::with('rek')->with('prokers')->where('ref', $ref)->first();
            if (!$donasi) {
                return abort(404, 'Donasi zakat tidak ditemukan');
            }
            $zakat = Proker::with('fundriser')->with('kategori')->where('status', 1)->first();

            return view('viewpublic.summary-zakat', ['zakat' => $zakat, 'donasi' => $donasi, 'ref' => $ref]);
        } catch (\Exception $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort(500, $message);
        } catch (\Illuminate\Database\QueryException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort($e->getCode(), $message);
        } catch (\PDOException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            abort($e->getCode(), $message);
        }
    }

    public function summaryStatus(Request $request)
    {
        $ref = $request->query('ref');
        $donasi = Donasi::with('rek')->with('prokers')->where('ref', $ref)->first();

        return view('viewpublic.summary-status', ['donasi' => $donasi]);
    }

    public function prosespembayaran(Request $request)
    {
        $iduser = $request->id;
        $validasi = $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg|max:1024'
        ]);

        $upload = \App\Donasi::find($iduser);
        if ($upload == null) {
            return redirect()->back()->with('gagal', 'Kode tidak ditemukan');
        }

        $foto = $request->file('photo');
        if ($foto) {
            $foto_path      = $foto->store('buktiuser', 'public');
            $upload->foto   = $foto_path;
        }
        $upload->save();

        return redirect()->back()->with('status', 'Bukti pengiriman Anda akan dikonfirmasi oleh admin dan Anda akan menerima email dari pihak Berkah Yatim ');
    }



    public function store(Request $request)
    {

        try {

            $this->validate($request, [
                'url' => 'required|exists:prokers,url',
                'nominal_donate' => 'required|string',
                'payment_method' => 'required|string',
                'name' => 'required|string',
                'invoice' => 'required|string|unique:donasis,invoice',
                'wa_or_email' => 'required|string',
                'anonymous_user' => 'nullable|string',
                'support_message' => 'nullable|string',
            ]);

            $validator = Validator::make(['wa_or_email' => $request->wa_or_email], [
                'wa_or_email' => 'required|email'
            ]);

            $isEmail = !$validator->fails();

            if ($validator->fails() && !is_numeric($request->wa_or_email)) {
                return redirect()->back()->with('errors', $validator->messages());
            }

            $validator = Validator::make(['wa_or_email' => $request->wa_or_email], [
                'wa_or_email' => 'required|phone'
            ]);

            if ($validator->fails() && is_numeric($request->wa_or_email)) {
                return redirect()->back()->with('errors', $validator->messages());
            }

            $latestDonation = Donasi::latest()->first();
            $proker = Proker::where('url', $request->url)->first();
            $user = User::where('email', $request->wa_or_email)
                ->orWhere('nohp', $request->wa_or_email)
                ->first();

            $nominal_donate = preg_replace("/(\D)/", '', $request->nominal_donate);
            $request->jumlah =  $nominal_donate;

            $validator = Validator::make(['jumlah' => $request->jumlah], [
                'jumlah' => 'required|numeric|min:10000|max:1000000000000'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('errors', $validator->messages());
            }

            // Store Donation
            DB::beginTransaction();
            $donasi = new Donasi;
            $donasi->campaign_id = $proker->id;
            $donasi->campaign_type = $proker->type;

            $donasi->invoice = $request->invoice;

            if (env('APP_LOCAL_USER')) {
                $donasi->invoice = env('APP_LOCAL_USER') . '-' . $donasi->invoice;
            }

            $donasi->jumlah = $nominal_donate;
            $donasi->message = $request->support_message;
            $donasi->mitra_id = $proker->fundriser_id;
            $donasi->nama = $request->anonymous_user == "true" ? 'Anonymous' : $request->name;
            $donasi->ref = MD5(RAND());
            $donasi->type = $request->payment_method;
            $donasi->url = $proker->url;
            $donasi->status = 'pending';
            $donasi->nohp = !$isEmail ? $request->wa_or_email : '';
            $donasi->no_rekening = '';
            $donasi->expired_at = Carbon::now()->addHours(6);
            $donasi->save();

            // Check Payment Method
            $snapToken = null;

            $manualPayments = ['mandiri', 'bni', 'bn_syr', 'bri', 'bca', 'ocbc'];

            if (in_array(strtolower($request->payment_method), $manualPayments)) {

                $rek = Rekening::where('bank', $donasi->type)->first();
                if ($rek)
                    $donasi->no_rekening = $rek->account;

                $donasi->email = $isEmail ? $request->wa_or_email : '';
                $paymentData = self::payUsingKitabisa($donasi);
                if (isset($paymentData['data'][0])) {
                    $donasi->jumlah = $paymentData['data'][0]['total_amount'];
                    $donasi->unique_code = $paymentData['data'][0]['unique_code'];
                    $donasi->reff_id = $paymentData['data'][0]['reff_id'];

                    $donasi->save();

                    $log = new Logs;
                    $log->name = "payment kitabisa";
                    $log->no = $request->invoice;
                    $log->content = json_encode($paymentData);
                    $log->created_at = Carbon::now();
                    $log->created_by = $request->wa_or_email;
                    $log->save();

                    // Send Notification
                    if ($donasi->nohp != 0)
                        $donasi->notify(new InvoiceNotifcation($donasi, "wa"));
                    else if ($donasi->email)
                        $donasi->notify(new InvoiceNotifcation($donasi, null));
                    // Actually store to DB
                    DB::commit();

                    $donasi->load('rek');
                    $donasi->load('prokers');

                    return redirect()->action('DonasiUser@summary', [
                        'ref' => $donasi->ref,
                        'snap_token' => $snapToken
                    ]);
                } else {
                    return redirect()->back()->with('gagal', 'Gagal membuat transaski. Mohon dicoba lagi.');
                }
            } else {

                $donasi->email = $isEmail ? $request->wa_or_email : $donasi->nohp . '@gmail.com';
                $snapToken = self::payUsingKVeritrans($donasi);
                if ($snapToken) {
                    $donasi->snap_token = $snapToken;

                    $log = new Logs;
                    $log->name = "payment midtrans";
                    $log->content = json_encode($request->input());
                    $log->no = $donasi->invoice;
                    $log->created_at = Carbon::now();
                    $log->created_by = $donasi->email;
                    $log->save();

                    $donasi->updated_at = date("Y-m-d H:i:s");

                    $donasi->save();

                    // Send Notification
                    //$donasi->notify(new InvoiceNotifcation($donasi));
                    // Actually store to DB
                    DB::commit();

                    $donasi->load('rek');
                    $donasi->load('prokers');

                    return redirect()->action('DonasiUser@pembayaran', [
                        'ref' => $donasi->ref,
                        'snap_token' => $snapToken
                    ]);
                } else {
                    return redirect()->back()->with('gagal', 'Gagal membuat transaski. Mohon dicoba lagi.');
                }
            }
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('gagal', $e->getMessage());
        } catch (RequestException $e) {
            DB::rollBack();
            if ($e->getResponse() != null) {
                $err = json_decode($e->getResponse()->getBody(), true);
                if(isset($err['response_desc']))
                    return redirect()->back()->with('gagal', $err['response_desc']['id']);
                else
                    return redirect()->back()->with('gagal', 'Payment Service Temporarily Unavailable');
            } else {
                return redirect()->back()->with('gagal', 'Payment service error. SSL_ERROR in connection to transfer.mutih.xyz:443');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }


    public function storeZakat(Request $request)
    {

        // return Uuid::uuid4();

        try {

            $this->validate($request, [
                'name' => 'required|string',
                'wa_or_email' => 'required|email',
                'total' => 'required|min:1',
                'program' => 'required|string',
                'zakat-payment-type' => 'required|string'
            ]);

            $validator = Validator::make(['wa_or_email' => $request->wa_or_email], [
                'wa_or_email' => 'required|email'
            ]);

            $isEmail = !$validator->fails();

            if ($validator->fails() && !is_numeric($request->wa_or_email)) {
                return redirect()->back()->with('errors', $validator->messages());
            }

            $latestDonation = Donasi::latest()->first();
            $user = User::where('email', $request->wa_or_email)
                ->orWhere('nohp')
                ->first();

            $nominal = preg_replace("/(\D)/", '', $request->total);
            $request->jumlah =  $nominal;

            $validator = Validator::make(['jumlah' => $request->jumlah], [
                'jumlah' => 'required|numeric|min:10000|max:1000000000000'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('errors', $validator->messages());
            }

            // Store Donation
            
            DB::beginTransaction();
            $donasi = new Donasi;
            $donasi->campaign_id = null;
            $donasi->campaign_type = $request->program;
            $donasi->invoice = $this->generateNumber($latestDonation);
            $donasi->jumlah = $nominal;
            $donasi->message = $request->support_message;
            $donasi->mitra_id = null;
            $donasi->nama = $request->anonim == "on" ? 'Anonymous' : $request->name;

            $donasi->ref = MD5(RAND());
            $donasi->type = $request->input('zakat-payment-type');
            $donasi->url = 'kalkulator-zakat';
            $donasi->status = 'pending';
            $donasi->email = $isEmail ? $request->wa_or_email : '';
            $donasi->nohp = !$isEmail ? $request->wa_or_email : '';
            $donasi->no_rekening = '';
            $donasi->expired_at =  Carbon::now()->addHours(6);
            $donasi->save();

            // Check Payment Method
            $snapToken = null;

            $manualPayments = ['mandiri', 'bni', 'bn_syr', 'bri', 'bca', 'ocbc'];

            if (in_array(strtolower($donasi->type), $manualPayments)) {

                $rek = Rekening::where('bank', $donasi->type)->first();
                if ($rek)
                    $donasi->no_rekening = $rek->account;

                $paymentData = self::payUsingKitabisa($donasi);
                $donasi->jumlah = $paymentData['data'][0]['total_amount'];
                $donasi->unique_code  = $paymentData['data'][0]['unique_code'];
                $donasi->reff_id = $paymentData['data'][0]['reff_id'];
                $donasi->save();

                if ($donasi->email != "")
                    $donasi->notify(new ZakatNotifcation($donasi));
                else
                    $donasi->notify(new ZakatNotifcation($donasi, 'wa'));

                $log = new Logs;
                $log->name = "payment kitabisa";
                $log->content = json_encode($paymentData);
                $log->created_at = Carbon::now();
                $log->created_by = $request->wa_or_email;
                $log->no = $donasi->invoice;
                $log->save();


                if (!$user) {
                    if (!$isEmail) {
                        $user = User::create([
                            'name' =>  $request->name,
                            'nohp' =>  $request->wa_or_email,
                            'status' => 'inactive',
                            'email' => null,
                            'password' => '',
                        ]);
                    } else {
                        $user = User::create([
                            'name' =>  $request->name,
                            'nohp' => null,
                            'status' => 'inactive',
                            'email' =>  $request->wa_or_email,
                            'password' => '',
                        ]);
                    }
                }

                DB::commit();

                return redirect()->action('DonasiUser@summaryZakat', [
                    'ref' => $donasi->ref,
                    'snap_token' => $snapToken
                ]);
            } else {

                $donasi->url = 'zakat';
                $donasi->email = $isEmail ? $request->wa_or_email : $donasi->nohp . '@gmail.com';
                $snapToken = self::payUsingKVeritrans($donasi);
                $donasi->snap_token = $snapToken;
                $donasi->save();

                $log = new Logs;
                $log->name = "payment midtrans";
                $log->content = json_encode($request->input());
                $log->created_at = Carbon::now();
                $log->no = $donasi->invoice;
                $log->created_by = $request->wa_or_email;
                $log->save();

                DB::commit();

                return redirect()->action('DonasiUser@pembayaranZakat', [
                    'ref' => $donasi->ref,
                    'snap_token' => $snapToken
                ]);
            }

            // Update User

        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('gagal', $e->getMessage());
        } catch (RequestException $e) {
            DB::rollBack();
            if ($e->getResponse() != null) {
                $err = json_decode($e->getResponse()->getBody(), true);
                if(isset($err['response_desc']))
                    return redirect()->back()->with('gagal', $err['response_desc']['id']);
                else
                    return redirect()->back()->with('gagal', 'Payment Service Temporarily Unavailable');
            } else {
                return redirect()->back()->with('gagal', 'Payment service error. SSL_ERROR in connection to transfer.mutih.xyz:443');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $validasi = $this->validate($request, [
                'foto' => 'image|mimes:jpeg,png,jpg|size:3072'
            ]);

            DB::beginTransaction();

            $iduser = $request->id;
            $upload = \App\Donasi::where('id', '=', $iduser);

            if ($request->file('foto')) {
                $foto = $request->file('foto');
                if ($upload->foto && file_exists(storage_path('app/public/' . $upload->foto))) {
                    Storage::delete('public/' . $upload->foto);
                }
                $foto_path = $foto->store('buktiuser', 'public');
                $upload->foto = $foto_path;
            }

            $upload->save();
            DB::commit();

            return redirect()->back()->with('status', 'Bukti Pengiriman Anda Akan Dikonfirmasi Oleh Admin');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Update gagal. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function payUsingKitabisa($donasi)
    {
        $client = new GuzzleHttp\Client(['base_uri' => env('KITABISA_GENI_URL', 'https://transfer.mutih.xyz/')]);

        $json = [
            'trx_id'            => $donasi->invoice,
            'amount'            => floatval($donasi->jumlah),
            'bank_code'         => $donasi->type,
            'bank_account'      => $donasi->no_rekening,
            'user_email'        => $donasi->email,
            'user_name'         => $donasi->nama,
            'user_phone'        => (string) $donasi->nohp,
            'remark'            => 'Donation ' . $donasi->invoice . ' by ' . $donasi->nama,
            'expired_at'        => (int) $donasi->expired_at->format('U'),
            'notification_url'  => env('KITABISA_NOTIF_URL', 'https://mutih.kitabisa.xyz/notification'),
        ];

        Log::info($json);

        $uuid = Uuid::uuid4();
        $timestamp = date('U');

        $headers = [
            'Content-Type'          => 'application/json',
            'X-Ktbs-Api-Version'    => 'v1.0.0',
            'X-Ktbs-Client-Version' => 'v1.0.0',
            'X-Ktbs-Client-Name'    => env('KITABISA_CLIENT_NAME', 'mutih'),
            'X-Ktbs-Platform-Name'  => env('KITABISA_PLATFORM_NAME', 'whitelabel'),
            'X-Ktbs-Time'           => $timestamp,
            'X-Ktbs-Request-ID'     => $uuid->toString(),
            'X-Ktbs-Signature'      => hash_hmac('sha256', env('KITABISA_CLIENT_NAME', 'mutih') . $timestamp, env('KITABISA_CLIENT_SECRET', 'urB2vnSfNp4QnohiH0Oy2fNiv2SBB8Ye'))
        ];
        
        $response = $client->post('v1/auth/transaction', [
            'auth' => [
                env('KITABISA_CLIENT_USERNAME', 'gaPBusF5JRt9nu46'),
                env('KITABISA_CLIENT_PASSWORD', '685FYM6EaKGjNHx5tuh4DJ4JC6HQX4YM'),
            ],
            'headers' => $headers,
            'json' => $json
        ]);

        return json_decode($response->getBody(), true);
    }

    public static function getTrxUsingKitabisa($id, $bank)
    {
        $client = new GuzzleHttp\Client(['base_uri' => env('KITABISA_GENI_URL', 'https://transfer.mutih.xyz/')]);

        $json = [
            'trx_id'            => $id,
            'bank_code'         => $bank,
        ];

        Log::info($json);

        $uuid = Uuid::uuid4();
        $timestamp = date('U');

        $headers = [
            'Content-Type'          => 'application/json',
            'X-Ktbs-Api-Version'    => 'v1.0.0',
            'X-Ktbs-Client-Version' => 'v1.0.0',
            'X-Ktbs-Client-Name'    => env('KITABISA_CLIENT_NAME', 'mutih'),
            'X-Ktbs-Platform-Name'  => env('KITABISA_PLATFORM_NAME', 'whitelabel'),
            'X-Ktbs-Time'           => $timestamp,
            'X-Ktbs-Request-ID'     => $uuid->toString(),
            'X-Ktbs-Signature'      => hash_hmac('sha256', env('KITABISA_CLIENT_NAME', 'mutih') . $timestamp, env('KITABISA_CLIENT_SECRET', 'urB2vnSfNp4QnohiH0Oy2fNiv2SBB8Ye'))
        ];

        $response = $client->get('v1/auth/transaction/' . $id . '/' . $bank . '', [
            'auth' => [
                env('KITABISA_CLIENT_USERNAME', 'gaPBusF5JRt9nu46'),
                env('KITABISA_CLIENT_PASSWORD', '685FYM6EaKGjNHx5tuh4DJ4JC6HQX4YM'),
            ],
            'headers' => $headers,
            'json' => $json
        ]);

        return json_decode($response->getBody(), true);
    }

    public static function payUsingKVeritrans($donasi)
    {
        return Veritrans_Snap::getSnapToken([
            'transaction_details' => [
                'order_id'      => $donasi->invoice,
                'gross_amount'  => $donasi->jumlah,
            ],
            'customer_details' => [
                'first_name'    => $donasi->nama,
                'email'         => $donasi->email,
                'phone'         => $donasi->nohp,
                // 'address'       => '',
            ],
            'item_details' => [
                [
                    'id'       => $donasi->type,
                    'price'    => $donasi->jumlah,
                    'quantity' => 1,
                    'name'     => $donasi->url
                ]
            ],
            "enabled_payments" => [$donasi->type]
        ]);
    }
}
