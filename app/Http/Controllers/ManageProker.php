<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Proker;
use App\Mitra;
use App\Donasi;
use App\Kategori;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ManageProker extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $proker = Proker::with('kategori')
            ->get();
        //alert()->success('Data telah Ditambahkan', 'Berhasil')->persistent('Close');

        return view('manageproker.index', ['proker' => $proker]);
    }


    public function prokerPilihan($id, $status)
    {
        $user = Auth::user();
        $produk = Proker::findOrFail($id);
        if ($produk) {
            $produk->is_pilihan = $status;
            $produk->created_by = $user->id;
            $produk->save();
            Cache::flush();
        }

        return redirect()->route('manage-campaign.index')->with('status', 'Item updated successfully.');
    }

    public function prokerUrgent($id, $status)
    {
        $user = Auth::user();

        $produk = Proker::findOrFail($id);
        if ($produk) {
            $produk->is_urgent = $status;
            $produk->created_by = $user->id;
            $produk->save();
            Cache::flush();
        }

        return redirect()->route('manage-campaign.index')->with('status', 'Item updated successfully.');
    }
    public function prokerStatus($id, $status)
    {
        $user = Auth::user();

        $produk = Proker::findOrFail($id);
        if ($produk) {
            $produk->status = $status;
            $produk->created_by = $user->id;
            $produk->save();
            Cache::flush();
        }

        return redirect()->route('manage-campaign.index')->with('status', 'Item updated successfully.');
    }

    public function create()
    {
        $mitras = Mitra::where('is_verified', 1)->get();
        $kategories = Kategori::where('status', 'active')->get();
        return view('manageproker.create', ['mitras' => $mitras, 'kategories' => $kategories]);
    }

    public function store(Request $request)
    {
        try {

            $validasi = $this->validate($request, [
                'dokumentasi' => 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=980,min_height=480|max:1024',
                'kategori' => 'required|exists:kategories,id',
                'pemilik' => 'required|exists:mitras,id',
                'deskripsi' => 'required|min:3|string',
                'url' => 'required|min:3|string',
                'deskripsi' => 'required|min:3|string',
                'urutan'=>'required|unique:prokers,urutan',
                'nama_kegiatan' => 'required|min:5|string|alpha'
            ]);

            if (!$validasi)
                return redirect()->back()->with('gagal', 'Menyimpan proker gagal. ');

            DB::beginTransaction();

            $proker = new \App\Proker;
            $dokumentasi = $request->file('dokumentasi');
            if ($dokumentasi) {
                $dokumentasi_path = $dokumentasi->store('fotoproker', 'public');
                $proker->dokumentasi = $dokumentasi_path;
            }
            $proker->nama_kegiatan  = $request->nama_kegiatan;
            $proker->deskripsi      = $request->deskripsi;
            $proker->target      = $request->target;
            $proker->tag      = $request->tag;
            $proker->urutan      = $request->urutan;
            $proker->url     = $request->url;
            $proker->note     = $request->note;
            $proker->type      = $request->kategori;
            $proker->target_date      = $request->target_date;
            $proker->fundriser_id      = $request->pemilik;
            $proker->created_by     = Auth::user()->id;
            $proker->save();
            DB::commit();

            Cache::flush();

            return redirect()->route('manage-campaign.index')->with('status', 'Data donasi '.$proker->nama_kegiatan.' berhasil disimpan');

        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Menyimpan program kerja gagal. ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $proker = DB::table('prokers')
            ->where('prokers.id', '=', $id)
            ->first();
        return view('manageproker.show', ['proker' => $proker]);
    }

    public function edit($id)
    {
        $mitras = Mitra::where('is_verified', 1)->get();
        $kategories = Kategori::where('status', 'active')->get();

        $proker = Proker::findOrfail($id);
        return view('manageproker.edit', ['proker' => $proker, 'mitras' => $mitras, 'kategories' => $kategories]);
    }

    public function update(Request $request, $id)
    {
        try {


            $validasi = $this->validate($request, [
                'dokumentasi' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=980,min_height=480|max:1024',
                'kategori' => 'required|exists:kategories,id',
                'pemilik' => 'required|exists:mitras,id',
                'deskripsi' => 'required|min:3|string',
                'url' => 'required|min:3|string',
                'deskripsi' => 'required|min:3|string',
                'urutan'=>'required',
                'nama_kegiatan' => 'required|min:5|string|alpha'
            ]);

            if (!$validasi)
                return redirect()->back()->with('gagal', 'Update proker gagal. ');

            DB::beginTransaction();

            $prokerSeq = Proker::where('urutan',$request->urutan)->first();

            $proker = Proker::findOrfail($id);

            if($prokerSeq){
                if($prokerSeq->urutan!=$proker->urutan)
                    return redirect()->back()->with('gagal', 'Mengubah campaign gagal. Urutan '.$request->urutan.' sudah dipakai oleh campaign '.$prokerSeq->nama_kegiatan);
            }

            $foto = $request->file('dokumentasi');
            if ($foto) {
                if ($proker->dokumentasi && file_exists(storage_path('app/public/' . $proker->dokumentasi))) {
                    Storage::delete('public/' . $proker->dokumentasi);
                }
                $foto_path = $foto->store('fotobeasiswa', 'public');
                $proker->dokumentasi = $foto_path;
            }
            $proker->nama_kegiatan  = $request->nama_kegiatan;
            $proker->tag      = $request->tag;
            $proker->target      = $request->target;
            $proker->url     = $request->url;
            $proker->note     = $request->note;
            $proker->type      = $request->kategori;
            $proker->note     = $request->note;
            $proker->urutan      = $request->urutan;
            $proker->target_date      = $request->target_date;
            $proker->fundriser_id      = $request->pemilik;
            $proker->deskripsi      = $request->deskripsi;
            $proker->left_day =  $proker->target_date->diffInDays();

            $proker->save();
            DB::commit();
            Cache::flush();

            return redirect()->route('manage-campaign.index')->with('status', 'Data donasi '.$proker->nama_kegiatan.' berhasil diubah');

        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->with('errors', $e->validator->getMessageBag());
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Mengubah program kerja gagal. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $cekinfak = \App\Donasi::where('campaign_id', '=', $id)->count();

        if ($cekinfak >= 1)
            return redirect()->back()->with('gagal', 'Data Tidak Dapat Dihapus, ada data donasi untuk campaign ini');

        $proker = \App\Proker::findOrfail($id);
        Storage::delete('public/' . $proker->dokumentasi);
        $proker->delete();
        Cache::flush();
        return redirect()->back()->with('status', 'Data Campaign Telah Dihapus');
    }
}
