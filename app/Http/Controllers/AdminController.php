<?php

namespace App\Http\Controllers;

use App\Donasi;
use App\Penyaluran;
use App\Proker;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $jenis = $request->jenis ?? null;
            $date = $request->value_date ?? null;

            $total = Donasi::where('status', 'verified');
            $paid = Donasi::where(function ($query) {
                $query->where('status', '=', 'success')
                      ->orWhere('status', '=', 'settlement');
            });
            $totaldonatur = User::where('status', 'active');
            $donasi = new Donasi();
            $belumdonasi = Donasi::where('status', 'pending');
            $expireddonasi = Donasi::where('status', 'expired');
            $totalpenyaluran = new Penyaluran();
            $totalproker = Proker::where('status', 1);
            $totalprokeroff = Proker::where('status', 0)
                ->where('target_date', '<', Carbon::now());

            if ($date) {

                $date = explode(' - ', $date);

                $starDate = Carbon::createFromFormat('d-m-Y H:i:s', $date[0] . ' 00:00:00');
                $endDate = Carbon::createFromFormat('d-m-Y H:i:s', $date[1] . ' 23:59:59');

                $total = $total->whereBetween('updated_at', [$starDate, $endDate]);
                $totaldonatur = $totaldonatur->whereBetween('updated_at', [$starDate, $endDate]);
                $donasi = $donasi->whereBetween('updated_at', [$starDate, $endDate]);
                $paid = $paid->whereBetween('updated_at', [$starDate, $endDate]);
                $belumdonasi = $belumdonasi->whereBetween('updated_at', [$starDate, $endDate]);
                $expireddonasi = $expireddonasi->whereBetween('updated_at', [$starDate, $endDate]);
                $totalpenyaluran = $totalpenyaluran->whereBetween('updated_at', [$starDate, $endDate]);
                $totalproker = $totalproker->whereBetween('updated_at', [$starDate, $endDate]);
                $totalprokeroff = $totalprokeroff->whereBetween('updated_at', [$starDate, $endDate]);

                $message = 'Menampilkan data';

                if ($starDate->format('Y-m-d') == $endDate->format('Y-m-d')) {
                    $message .= ' tanggal ' . $starDate->format('j F Y');
                } else {
                    $message .= ' dari tanggal ' . $starDate->format('j F Y') . ' hingga ' . $endDate->format('j F Y');
                }

                session()->flash('status', $message);
            }

            $total = $total->sum('jumlah');
            $totaldonatur = $totaldonatur->count();
            $banyakdonasi = $donasi->count();
            $donasi = $donasi->sum('jumlah');
            $paid = $paid->sum('jumlah');
            $belumdonasi = $belumdonasi->sum('jumlah');
            $expireddonasi = $expireddonasi->sum('jumlah');
            $totalpenyaluran = $totalpenyaluran->sum('jumlah');
            $totalproker = $totalproker->count();
            $totalprokeroff = $totalprokeroff->count();
            $sisasaldo = $total - $totalpenyaluran;            

            return view('dashboard', [
                'value' => $date, 
                'paid'=> format_uang($paid),
                'totalprokeroff' => $totalprokeroff, 
                'totalproker' => $totalproker, 
                'banyakdonasi' => $banyakdonasi, 
                'sisasaldo' => format_uang($sisasaldo), 
                'expireddonasi'=> format_uang($expireddonasi),
                'totalpenyaluran' => format_uang($totalpenyaluran), 
                'belumdonasi' => format_uang($belumdonasi), 
                'totaldonasi' => format_uang($total), 
                'totaldonatur' => $totaldonatur, 
                'total' => format_uang($donasi)
            ]);

        } catch (ValidationException $e) {
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', 'Filter data dashboard gagal. ' . $e->getMessage());
        }
    }
}
