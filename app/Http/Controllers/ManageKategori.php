<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Kategori;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;


class ManageKategori extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function kategoriStatus($id, $status)
    {
        $user = Auth::user();

        $produk = \App\Kategori::findOrFail($id);
        if ($produk) {
            $produk->status = $status;
            $produk->created_by = $user->id;
            $produk->save();
        }

        return redirect()->route('manage-kategori.index')->with('status', 'Item updated successfully.');
    }

    public function index()
    {
        $kategori = DB::table('kategories')
            ->join('admins', 'admins.id', '=', 'kategories.created_by')
            ->select('kategories.*', 'admins.name as namaadmin')
            ->get();
        return view('managekategori.index', ['kategori' => $kategori]);
    }

    public function create()
    {
        return view('managekategori.create');
    }

    public function store(Request $request)
    {
        try {

            $validasi = $this->validate($request, [
                'nama'=>'required|min:3',
                'nama_tombol'=>'required|min:3',
                'dokumentasi' => 'image|mimes:jpeg,png,jpg,svg|dimensions:min_width=256,min_height=256|max:1024'
            ]);

            if (!$validasi)
                return redirect()->back()->with('gagal', 'Menyimpan kategori gagal. ');

            DB::beginTransaction();

            $kategori = new \App\Kategori;
            $foto = $request->file('dokumentasi');
            if ($foto) {
                $kategori_path = $foto->store('fotokategori', 'public');
                $kategori->dokumentasi = $kategori_path;
            }
            $kategori->nama    = $request->nama;
            $kategori->nama_button  = $request->nama_tombol;
            $kategori->created_by = Auth::user()->id;
            $kategori->save();
            DB::commit();
            Cache::flush();

            return redirect()->route('manage-kategori.index')->with('status', 'Data kategori '.$kategori->nama.' berhasil disimpan');

        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Simpan kategori gagal. ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $proker = DB::table('kategories')
            ->where('id', '=', $id)
            ->first();
        return view('managekategori.show', ['show' => $proker]);
    }

    public function edit($id)
    {
        $kategori = \App\Kategori::findOrfail($id);
        return view('managekategori.edit', ['kategori' => $kategori]);
    }

    public function update(Request $request, $id)
    {
        try {

            $validasi = $this->validate($request, [
                'nama'=>'required|min:3',
                'nama_tombol'=>'required|min:3',
                'dokumentasi' => 'image|mimes:jpeg,png,jpg,svg|dimensions:min_width=256,min_height=256|max:1024'
            ]);

            if (!$validasi)
                return redirect()->back()->with('gagal', 'Mengubah kategori gagal. ');

            DB::beginTransaction();

            $kategori = \App\Kategori::findOrfail($id);

            $foto = $request->file('dokumentasi');
            if ($foto) {
                if ($kategori->dokumentasi && file_exists(storage_path('app/public/' . $kategori->dokumentasi))) {
                    Storage::delete('public/' . $kategori->dokumentasi);
                }
                $foto_path = $foto->store('fotokategori', 'public');
                $kategori->dokumentasi = $foto_path;
            }
            $kategori->nama    = $request->nama;
            $kategori->nama_button  = $request->nama_tombol;
            $kategori->updated_by    = Auth::user()->name;
            $kategori->save();
            DB::commit();
            Cache::flush();

            return redirect()->route('manage-kategori.index')->with('status', 'Data kategori '.$kategori->nama.' berhasil diubah');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Mengubah kategori gagal. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $cekbeasiswa = \App\Proker::where('type', '=', $id)->count();;
        if ($cekbeasiswa >= 1)
            return redirect()->back()->with('status', 'Data Tidak Dapat Dihapus, ada Campaign dari kategori ini');

        $kategori = \App\Kategori::findOrfail($id);
        $kategori->delete();
        Cache::flush();

        return redirect()->back()->with('status', 'Data kategori Telah Dihapus');
    }
}
