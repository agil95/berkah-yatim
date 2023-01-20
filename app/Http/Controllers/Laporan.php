<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class Laporan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {

        $distinctyear   = DB::table('donasis')
                            ->selectRaw('YEAR(created_at) as date')
                            ->distinct()
                            ->get();

        if($request->get('year') && $request->get('month')) {


            $laporan =  \App\Penyaluran::with('prokers')
            ->select('name as nama_penerima', 'penyaluran', 'jumlah as jumlah_total', 'created_at')
            ->whereYear('created_at', '=', $request->get('year'))
            ->whereMonth('created_at', '=', $request->get('month'))
            ->orderBy('created_at','=','asc')
            ->get();

            $totalkeseluruhan   =  \App\Penyaluran::whereYear('created_at', '=', $request->get('year'))
            ->whereMonth('created_at', '=', $request->get('month'))
            ->sum('jumlah');

            $year  = $request->get('year');
            $month = $request->get('month'); 
        }
            else {
            
            $laporan = \App\Penyaluran::with('prokers')
            ->select('name as nama_penerima', 'penyaluran', 'jumlah as jumlah_total', 'created_at')
            ->get();

            $distinctyear = DB::table('donasis')
                            ->selectRaw('YEAR(created_at) as date')   
                            ->distinct()
                            ->get();
            // dd($distinctyear);

            $totalkeseluruhan   = \App\Penyaluran::sum('jumlah');
            $year   = "";
            $month  = "";
            }

            return view('laporan.laporan', ['laporan' => $laporan, 'total' => $totalkeseluruhan, 'tahun' => $distinctyear, 'year' => $year, 'month' => $month ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
