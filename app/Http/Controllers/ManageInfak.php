<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ManageInfak extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $infak = \App\Kegiataninfak::orderBy('updated_at', 'desc')->get();
        $infak = DB::table('kegiataninfaks')
                ->join('admins', 'admins.id', '=', 'kegiataninfaks.created_by')
                ->join('mitras', 'mitras.id', '=', 'kegiataninfaks.id_mitra')
                ->select('kegiataninfaks.*', 'mitras.nama as namaproker', 'admins.name as namaadmin')
                ->get();
        return view('manageinfak.index',['infak' => $infak]);
    }

    public function create()
    {
        $mitra          = \App\Mitra::get();
        $totaldonasi    = \App\Totaldonasi::findOrFail(1);
        $h              = $totaldonasi->total;
        $total          = format_uang($h);
        $nama_kegiatan  = \App\Mitra::get();
        return view('manageinfak.create',['total' => $total, 'nama_kegiatan' => $nama_kegiatan]);
    }

    public function store(Request $request)
    {
        $validasi = $this->validate($request, [
            'dokumentasi' => 'image|mimes:jpeg,png,jpg|max:3072'
        ]);

        $total = \App\Totaldonasi::findOrFail(1);
        $totaldonasi = $total->total;
        if ($request->get('jumlah') > $totaldonasi) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Saldo Tidak Cukup');
        } else if ($request->get('jumlah') < 10000) {
            return redirect()->back()->with('gagal', 'Gagal Menginput Data, Harus diatas Rp. 10.000');
        } else 
        $total->total = $totaldonasi - $request->get('jumlah');
        $total->total_tersalurkan = $total->total_tersalurkan + $request->get('jumlah');
        $total->save();

        $infak = new \App\Kegiataninfak;
        $infak->judul     = $request->judul;
        $infak->id_mitra     = $request->mitra;
        $infak->jumlah       = $request->jumlah;
        $infak->day          = $request->day;
        
        $infak->deskripsi         = $request->deskripsi;
        $infak->created_by        = Auth::user()->id;
        $infak->roles             = 1;
        $dokumentasi = $request->file('dokumentasi');
        if($dokumentasi) {
            $dokumentasi_path = $dokumentasi->store('kegiataninfak', 'public');
            $infak->dokumentasi = $dokumentasi_path;
        }
        $infak->save();

        return redirect()->back()->with('status', 'Data Kegiatan infak Berhasil Ditambahkan');

    }

    public function show($id)
    {
        $infak = DB::table('kegiataninfaks')
                ->join('admins', 'admins.id', '=', 'kegiataninfaks.created_by')
                ->join('mitras', 'mitras.id', '=', 'kegiataninfaks.id_mitra')
                ->select('kegiataninfaks.*', 'mitras.nama as namaproker', 'admins.name as namaadmin')
                ->where('kegiataninfaks.id', '=', $id)
                ->first();

        return view('manageinfak.show', ['show' => $infak]);
    }

    public function edit($id)
    {
        $proker = \App\Mitra::get();
        $infak = \App\Kegiataninfak::findOrfail($id);   
        return view('manageinfak.edit',['infak' => $infak, 'proker' => $proker ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $this->validate($request, [
            'dokumentasi' => 'image|mimes:jpeg,png,jpg|max:3072'
        ]);
        $infaks = \App\Kegiataninfak::findOrfail($id);
        $infaks->judul     = $request->judul;
        $infaks->id_mitra    = $request->mitra;
        $infaks->deskripsi        = $request->deskripsi;
        $infaks->updated_by       = Auth::user()->name;
        $infaks->jumlah       = $request->jumlah;
        $infaks->day          = $request->day;
        $foto = $request->file('dokumentasi');
        if($foto){
            if($infaks->dokumentasi && file_exists(storage_path('app/public/' . $infaks->dokumentasi))) { 
                Storage::delete('public/'. $infaks->dokumentasi);
            }
            $foto_path = $foto->store('kegiataninfak', 'public');
            $infaks->dokumentasi = $foto_path;
        }
        $infaks->save();

        return redirect()->back()->with('status', 'Data Kegiatan Infak Berhasil Diedit');
    }

    public function destroy($id)
    {
        $infak = \App\Kegiataninfak::findOrfail($id);
        $infak->delete();
        return redirect()->back()->with('status', 'Data Kegiatan Infak Berhasil Dihapus');
    }
}
