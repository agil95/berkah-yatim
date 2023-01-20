<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
use Auth;
use Storage;
use Illuminate\Support\Facades\Cache;
use ImageOptimizer;

class ManageBanner extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $banner = DB::table('banners')
                ->join('admins', 'admins.id', '=', 'banners.created_by')
                ->select('banners.*', 'admins.name as namaadmin')
                ->get();
        Alert::success('Title', 'Message');
            return view('managebanner.index',['banner' => $banner]);
    }

    public function create()
    {
        return view('managebanner.create');
    }

    public function store(Request $request)
    {
        $validasi = $this->validate($request, [
            'dokumentasi' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=980,min_height=480|max:1024'
        ]);

        $banner = new \App\Banner;
        $foto = $request->file('dokumentasi');
        if($foto) {
            $banner_path = $foto->store('fotobanner', 'public');
            $banner->dokumentasi = $banner_path;
        }
        $banner->nama    = $request->nama;
        $banner->link  = $request->link;
        $banner->created_by = Auth::user()->id;
        $banner->save();
        Cache::flush();

        return redirect()->back()->with('status', 'Berhasil Menambahkan banner');
    }

    public function show($id)
    {
        $proker = DB::table('banners')
        ->where('id', '=', $id)
        ->first();
        return view('managebanner.show', ['show' => $proker]);

    }

    public function edit($id)
    {
        $banner = \App\Banner::findOrfail($id);   
        return view('managebanner.edit',['banner' => $banner ]);    
    }

    public function update(Request $request, $id)
    {
        $validasi = $this->validate($request, [
            'dokumentasi' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=980,min_height=480|max:1024'
        ]);

        $banner = \App\Banner::findOrfail($id);

        $foto = $request->file('dokumentasi');
        if($foto){
            if($banner->dokumentasi && file_exists(storage_path('app/public/' . $banner->dokumentasi))) { 
                \Storage::delete('public/'. $banner->dokumentasi);
            }
            $foto_path = $foto->store('fotobanner', 'public');
            $banner->dokumentasi = $foto_path;
        }
        $banner->nama    = $request->nama;
        $banner->link  = $request->link;
        $banner->updated_by    = Auth::user()->name;
        $banner->save();
        Cache::flush();

        return redirect()->back()->with('status', 'Data banner Telah Diedit');
    }

    public function destroy($id)
    {
        $banner = \App\Banner::findOrfail($id);
        $banner->delete();
        Cache::flush();

        return redirect()->back()->with('status', 'Data banner Telah Dihapus');

    }
}
