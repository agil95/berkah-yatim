<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use App\Donasi;
use App\Rekening;
use App\Proker;
use App\Notifications\InvoiceNotifcation;
use Illuminate\Support\Facades\Auth;


class ManageDonasi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $status = $request->get('status');
        $users = \App\Donasi::get();

        if ($status == 'belum') {
            $users = \App\Donasi::where('status', '=', $status)->orWhere('status', '=', 'pending')->orderBy('updated_at', 'desc')->get();
        } else if ($status == 'sampai') {
            $users = \App\Donasi::where('status', '=', $status)->orWhere(function ($query) {
                $query->where('status', '=', 'success')
                      ->orWhere('status', '=', 'settlement');
            })->orderBy('updated_at', 'desc')->get();
            
        } else if ($status == 'manual') {
            $users = \App\Donasi::where('status', '=', $status)->Where('type', '=', 'manual')->orderBy('updated_at', 'desc')->get();
        }
        return view('managedonasi.donasiuser', ['donasi' => $users]);
    }

    public function manual(Request $request)
    {
        $status = $request->get('status');
        $users = \App\Donasi::get();

        $users = \App\Donasi::where('status', '=', $status)->Where('status', '=', 'manual')->orderBy('updated_at', 'desc')->get();
        return view('managedonasi.donasimanual', ['donasi' => $users]);
    }

    public function ngo(Request $request)
    {
        $users = \App\Donasi::get();

        $users = \App\Donasi::Where('type', '=', 'manual')->orderBy('updated_at', 'desc')->get();
        return view('managedonasi.donasingo', ['donasi' => $users]);
    }

    public function status(Request $request)
    {
        $users = \App\Donasi::get();

        return view('managedonasi.donasistatus', ['donasi' => $users]);
    }

    function generateNumber($row)
    {
        $number = rand(0, 999999999);
        $number = str_pad($number, 4, 0, STR_PAD_LEFT);
        return $number;
    }

    public function create()
    {
        $donasilast = Donasi::orderBy('id', '=', 'desc')->first();
        $banks = Rekening::where('status',1)->get();
        $campaigns = Proker::where('status',1)->get();
        $invoice = $this->generateNumber($donasilast);

        return view('managedonasi.create', ['invoice' => $invoice,'banks'=>$banks,'campaigns'=>$campaigns]);
    }

    

    public function store(Request $request)
    {
        try {

            $this->validate($request, [
                'tgl_donasi' => 'required|date',
                'jumlah' => 'required|numeric',
                'campaign' => 'required|exists:prokers,id',
                'nama' => 'required|min:3',
                'nohp' => 'required|phone',
                'invoice' => 'required|min:5',
                'email' => 'required|email',
                'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:1024'
            ]);

            DB::beginTransaction();
            
            $proker = \App\Proker::where('id', $request->campaign)->first();

            $donasi    = new Donasi;
        
            $donasi->invoice = $request->invoice;
            $donasi->ref = MD5(RAND());
            $donasi->jumlah = $request->jumlah;
            $donasi->campaign_id = $proker->campaign_id;
            $donasi->campaign_type = $proker->type;
            $donasi->url = $proker->url;
            $donasi->status =  $request->status;
            $donasi->nama = $request->nama;
            $donasi->type = 'manual';
            $donasi->created_at = $request->tgl_donasi;
            $donasi->email = $request->email;
            $donasi->nohp = $request->nohp;
            $donasi->mitra_id = $proker->fundriser_id;

            $dokumentasi = $request->file('bukti_bayar');
            if ($dokumentasi) {
                $dokumentasi_path = $dokumentasi->store('fotobukti', 'public');
                $donasi->foto = $dokumentasi_path;
            }

            $donasi->save();
            
            DB::commit();            
           
            return redirect()->route('manage-donasi-user.ngo')->with('status', 'Data donasi '.$donasi->invoice.' berhasil disimpan');

            
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Donasi gagal. ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $Donasi = DB::table('Donasis')
            ->where('Donasis.id', '=', $id)
            ->first();
        return view('manageDonasi.show', ['Donasi' => $Donasi]);
    }

    public function edit($id)
    {
        $banks = Rekening::where('status',1)->get();
        $campaigns = Proker::where('status',1)->get();
        $donasi = Donasi::where('id', $id)->first();

        return view('managedonasi.edit', ['donasi' => $donasi,'banks'=>$banks,'campaigns'=>$campaigns]);
    }


    public function update(Request $request, $id)
    {
    try {

        $this->validate($request, [
            'tgl_donasi' => 'required|date',
            'jumlah' => 'required|numeric',
            'campaign' => 'required|exists:prokers,id',
            'nama' => 'required|min:3',
            'nohp' => 'required|phone',
            'invoice' => 'required|min:5',
            'email' => 'required|email',
            'bukti_bayar' => 'image|mimes:jpeg,png,jpg|max:1024'
        ]);

        DB::beginTransaction();
        
        $proker = \App\Proker::where('id', $request->campaign)->first();

        $donasi   = Donasi::where('id',$id)->first();
    
        $donasi->invoice = $request->invoice;
        $donasi->ref = MD5(RAND());
        $donasi->jumlah = $request->jumlah;
        $donasi->campaign_id = $proker->campaign_id;
        $donasi->campaign_type = $proker->type;
        $donasi->url = $proker->url;
        $donasi->status =  $request->status;
        $donasi->nama = $request->nama;
        $donasi->type = 'manual';
        $donasi->created_at = $request->tgl_donasi;
        $donasi->email = $request->email;
        $donasi->nohp = $request->nohp;
        $donasi->mitra_id = $proker->fundriser_id;

        $dokumentasi = $request->file('bukti_bayar');
        if ($dokumentasi) {
            $dokumentasi_path = $dokumentasi->store('fotobukti', 'public');
            $donasi->foto = $dokumentasi_path;
        }

        $donasi->save();
        
        DB::commit();            
       
        return redirect()->route('manage-donasi-user.ngo')->with('status', 'Data donasi '.$donasi->invoice.' berhasil diubah');
        
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Donasi gagal. ' . $e->getMessage());
        }
    }

    public function updateold(Request $request, $id)
    {

        try {

            DB::beginTransaction();

            $donasisampai = \App\Donasi::findOrFail($id);
            $email = $donasisampai->email;

            $data = array(
                'name' => $donasisampai->nama,
                'program' => $donasisampai->url,
                'jumlah' => $donasisampai->jumlah,
                'invoice' => $donasisampai->invoice,
                'email_body' => 'Bukti Donasi Anda sejumlah ' . $donasisampai->jumlah . ' telah diterima oleh Admin'
            );

            Mail::send('sendemail', $data, function ($mail) use ($email, $donasisampai) {
                $mail->to($email, 'no-reply')
                    ->subject("Penerimaan Donasi Manual " . $donasisampai->invoice);
                $mail->from('noreply.berkahyatim@gmail.com', 'Berkah Yatim');
            });
            if (Mail::failures()) {
                return redirect()->back()->with('gagal', 'Donasi gagal Diterima');
            }

            $donasisampai->status = 'success';
            $donasisampai->confirm_by = Auth::user()->id;
            $donasisampai->save();
            DB::commit();

            return redirect()->back()->with('status', 'Donasi Telah Diterima');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Edit Profile gagal. ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {

            DB::beginTransaction();

            $donasi = \App\Donasi::findOrfail($id);
            $donasi->delete();
            DB::commit();

            return redirect()->back()->with('status', 'Data donasi '.$donasi->invoice.' berhasil dihapus');

    } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Delete donasi gagal. ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePayment(Request $request)
    {
        try {

            $validasi = $this->validate($request, [
                'invoice' => 'required',
                'status' => 'required',
            ]);

            if (!$validasi)
                return redirect()->back()->with('gagal', 'Update payment status gagal. ');

            DB::beginTransaction();

            $donasi = \App\Donasi::where('invoice',$request->invoice)->first();
            $donasi->status = $request->status;
            $donasi->confirm_by = Auth::user()->id;
            $donasi->updated_at = date("Y-m-d H:i:s");

            $donasi->save();
            if($donasi->nohp!="")
                $donasi->notify(new InvoiceNotifcation($donasi, "wa"));
            else if($donasi->email)
                $donasi->notify(new InvoiceNotifcation($donasi, null));

            DB::commit();

            return redirect()->back()->with('status', 'Payment status '.$donasi->invoice.'  berhasil diubah');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Payment status gagal diubah. ' . $e->getMessage());
        }
    }

}
