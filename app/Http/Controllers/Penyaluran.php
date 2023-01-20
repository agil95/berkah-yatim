<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\URL;
use DB;

class Penyaluran extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request) 
    {

        $penyaluran = \App\Penyaluran::with('prokers')
            ->join('admins', 'admins.id', '=', 'penyalurans.created_by')
            ->select('penyalurans.*', 'admins.name as namaadmin')
            ->get();
        
        return view('managepenyaluran.index', ['book' => $penyaluran]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $donasis = \App\Donasi::where('status', '=', 'verified')->get();

        $prokers = \App\Proker::get();

        $h = $donasis->sum('jumlah');
        $total = format_uang($h);

        return view('managepenyaluran.create', ['total'=> $total,'prokers'=>$prokers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $donasis = \App\Donasi::where('status', '=', 'verified')->get();
        $totaldonasi =  $donasis->sum('jumlah');

        if ($request->get('jumlah') > $totaldonasi) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal menginput data. Saldo tersisa '.$totaldonasi);
        } else if ($request->get('jumlah') < 10000) {
            return redirect()->back()->with('gagal', 'Gagal Menginput Data, Harus diatas 0 Rupiah');
        } else 

        $new_book = new \App\Penyaluran;
        $new_book->name = $request->input('nama');
        $new_book->deskripsi = $request->input('deskripsi');
        $new_book->jumlah = $request->input('jumlah');
        $new_book->penyaluran = $request->input('penyaluran');
        $dokumentasi = $request->file('dokumentasi');
        if($dokumentasi) {
            $dokumentasi_path = $dokumentasi->store('dokumentasi', 'public');
            $new_book->dokumentasi = $dokumentasi_path;
        }
        $new_book->created_by = \Auth::user()->id;
        $new_book->save();
        return redirect()->route('penyaluran.create')->with('status', 'Penyaluran berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DB::table('penyalurans')
                ->join('admins', 'admins.id', '=', 'penyalurans.created_by')
                ->select('penyalurans.*', 'admins.name as namaadmin')
                ->where('penyalurans.id', '=', $id)
                ->first();
        return view('managepenyaluran.show', ['show' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prokers = \App\Proker::get();

        $book = DB::table('penyalurans')
                ->join('admins', 'admins.id', '=', 'penyalurans.created_by')
                ->select('penyalurans.*', 'admins.name as namaadmin')
                ->where('penyalurans.id', '=', $id)
                ->first();
        return view('managepenyaluran.edit', ['book' => $book,'prokers'=>$prokers]);
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

        $total = \App\Donasi::where('status', '=', 'verified')->get();
        $totaldonasi = $total->sum('jumlah');

        // dd($totaldonasi);
        if ($request->get('jumlah') > $totaldonasi) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Saldo Tidak Cukup');
        } else if ($request->get('jumlah') < 10000) {
            return redirect()->back()->with('gagal', 'Gagal Menginput Data, Harus diatas 0 Rupiah');
        } 

        $book = \App\Penyaluran::findOrfail($id);
        $book->name = $request->input('nama');
        $book->deskripsi = $request->input('deskripsi');
        $book->penyaluran = $request->input('penyaluran');
        $book->jumlah = $request->input('jumlah');
        $book->updated_by = \Auth::user()->name;
        $new_cover = $request->file('dokumentasi');
        if($new_cover){
            if($book->dokumentasi && file_exists(storage_path('app/public/' . $book->dokumentasi))) { 
                \Storage::delete('public/'. $book->dokumentasi);
            }
            $new_cover_path = $new_cover->store('dokumentasi', 'public');
            $book->dokumentasi = $new_cover_path;
        }
        $book->save();
        return redirect()->route('penyaluran.edit', ['id'=>$book->id])->with('status', 'Penyaluran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $book = \App\penyaluran::findOrFail($id);
        $book->delete();    
        return redirect()->route('managepenyaluran.index')->with('status', 'Penyaluran moved to trash');
    }

    public function trash()
    {
        $books = \App\Penyaluran::onlyTrashed()->paginate(10);
        return view('managepenyaluran.trash', ['books' => $books]);
    }

    public function deletepermanent($id){
        $book = \App\Penyaluran::findOrFail($id);
        $book->delete(); 
            return redirect()->route('managepenyaluran.index')->with('status', 'Penyaluran
                permanently deleted!');
        
    }

    public function restore($id){
        $category = \App\Penyaluran::withTrashed()->findOrFail($id);
        if($category->trashed()){
            $category->restore();
            if ($category->status == 'draft') {
                return redirect()->route('penyaluran.index.?status=draft')->with('status', 'Penyaluran successfully restored');
            } else
            return redirect()->route('penyaluran.index')->with('status', 'Penyaluran successfully restored');
            
        } else {
            return redirect()->route('penyaluran.index')->with('status', 'Category is not in trash');
        }
        return redirect()->route('penyaluran.index')->with('status', 'Penyaluran successfully restored');
    }

    public function wow()
    {
        $total = \App\Donasi::sum('jumlah');
        return view('wow', ['donasi' => $total]);
    }
}
