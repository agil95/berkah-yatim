<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Auth;
use Storage;
use App\Rekening;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Validation\ValidationException;

class ManageRekening extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rekening = DB::table('rekenings')->get();
        return view('managerekening.index',['rekening' => $rekening]);
    }

    public function create()
    {
        return view('managerekening.create');
    }

    public function rekeningStatus($id, $status)
    {
        $user = Auth::user();

        $produk = \App\Rekening::findOrFail($id);
        if ($produk) {
            $produk->status = $status;
            $produk->created_by = $user->id;
            $produk->save();
        }

        return redirect()->route('manage-rekening.index')->with('status', 'Item updated successfully.');
    }

    public function store(Request $request)
    {
        try {

            $this->validate($request, [
                'bank' => 'required|min:3|unique:rekenings',
                'account' => 'required|numeric|unique:rekenings',
                'label' => 'required|min:3',
                'tipe' => 'required|min:3',
                'judul_panduan_pembayaran1' => 'min:3',
                'judul_panduan_pembayaran2' => 'min:3',
                'judul_panduan_pembayaran3' => 'min:3',
                'panduan_pembayaran1' => 'min:3',
                'panduan_pembayaran2' => 'min:3',
                'panduan_pembayaran3' => 'min:3',
                'owner' => 'required|min:3',
                'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024'
            ]);

            DB::beginTransaction();

            $rekening = new \App\Rekening;
            $foto = $request->file('logo');
            if($foto) {
                $rekening_path = $foto->store('fotorekening', 'public');
                $rekening->dokumentasi = $rekening_path;
            }
            $rekening->bank    = strtolower($request->bank);
            $rekening->account  = $request->account;
            $rekening->branch  = $request->label;
            $rekening->tipe  = $request->tipe;
            $rekening->owner  = $request->owner;
            $rekening->created_by = Auth::user()->id;
            $rekening->judul_panduan_pembayaran1= $request->judul_panduan_pembayaran1;
            $rekening->judul_panduan_pembayaran2= $request->judul_panduan_pembayaran2;
            $rekening->judul_panduan_pembayaran3= $request->judul_panduan_pembayaran3;
            $rekening->panduan_pembayaran1= $request->panduan_pembayaran1;
            $rekening->panduan_pembayaran2= $request->panduan_pembayaran2;
            $rekening->panduan_pembayaran3= $request->panduan_pembayaran3;

            $rekening->save();

            DB::commit();            
            
            return redirect()->route('manage-rekening.index')->with('status', 'Data rekening berhasil disimpan');
        
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Simpan rekening gagal. ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $proker = DB::table('rekenings')
        ->where('id', '=', $id)
        ->first();
        return view('managerekening.show', ['show' => $proker]);

    }

    public function edit($id)
    {
        $rekening = \App\Rekening::findOrfail($id);   
        return view('managerekening.edit',['rekening' => $rekening ]);    
    }

    public function update(Request $request, $id)
    {

        try {

            $this->validate($request, [
                'bank' => 'required|min:3',
                'account' => 'required|numeric',
                'label' => 'required|min:1',
                'tipe' => 'required|min:3',
                'owner' => 'required|min:3',
                'logo' => 'image|mimes:jpeg,png,jpg,svg|max:1024',
                'judul_panduan_pembayaran1' => 'min:3',
                'judul_panduan_pembayaran2' => 'min:3',
                'judul_panduan_pembayaran3' => 'min:3',
                'panduan_pembayaran1' => 'min:3',
                'panduan_pembayaran2' => 'min:3',
                'panduan_pembayaran3' => 'min:3'
            ]);

        $rekening = \App\Rekening::findOrfail($id);

        $foto = $request->file('dokumentasi');
        if($foto){
            if($rekening->dokumentasi && file_exists(storage_path('app/public/' . $rekening->dokumentasi))) { 
                \Storage::delete('public/'. $rekening->dokumentasi);
            }
            $foto_path = $foto->store('fotorekening', 'public');
            $rekening->dokumentasi = $foto_path;
        }
        $rekening->bank    = strtolower($request->bank);
        $rekening->account  = $request->account;
        $rekening->tipe  = $request->tipe;
        $rekening->branch  = $request->label;
        $rekening->owner  = $request->owner;
        $rekening->updated_by    = Auth::user()->name;
        $rekening->judul_panduan_pembayaran1= $request->judul_panduan_pembayaran1;
        $rekening->judul_panduan_pembayaran2= $request->judul_panduan_pembayaran2;
        $rekening->judul_panduan_pembayaran3= $request->judul_panduan_pembayaran3;
        $rekening->panduan_pembayaran1= $request->panduan_pembayaran1;
        $rekening->panduan_pembayaran2= $request->panduan_pembayaran2;
        $rekening->panduan_pembayaran3= $request->panduan_pembayaran3;

        $rekening->save();

         DB::commit();            
            
        return redirect()->route('manage-rekening.index')->with('status', 'Data rekening berhasil diubah');

        
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Ubah rekening gagal. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {        
        $rekening = \App\Rekening::findOrfail($id);
        $rekening->delete();
        return redirect()->back()->with('status', 'Data rekening Telah Dihapus');

    }
}
