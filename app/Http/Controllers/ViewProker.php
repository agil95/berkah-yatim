<?php

namespace App\Http\Controllers;

use App\Donasi;
use App\Donasiuser;
use App\Penyaluran;
use App\Proker;
use App\Kategori;
use Illuminate\Http\Request;


class ViewProker extends Controller
{
    public function show(Request $request, $slug)
    {

        try {

            $proker = Proker::with('fundriser')->with('kategori')->where('url', $slug)->first();

            if (!$proker) {
                return abort(404, 'Proker tidak ditemukan');
            } else {

                $mitraDonations = Donasi::with('user:id,name,foto,email,activated,created_at,updated_at')
                    ->where('campaign_id', $proker->id)
                    ->where(function ($query) {
                        $query->where('status', '=', 'success')
                              ->orWhere('status', '=', 'settlement');
                    })
                    ->latest('updated_at')
                    ->get();

                $fundrisers = Donasiuser::with('user:id,name,foto,email,created_at,updated_at')
                    ->with(array("donaturs" => function ($query) use ($proker) {
                        $query->where("campaign_id", "=", $proker->id)->where('status','success')->orWhere('status','settlement');
                    }))
                    ->where('campaign_id', $proker->id)
                    ->latest()
                    ->get();

                $news = Penyaluran::where('penyaluran', $proker->id)
                    ->latest('updated_at')
                    ->get();

                $kategori = Kategori::where('status','active')->get();
                    

                //return compact('fundrisers');
                return view('viewpublic.proker')
                    ->withProker($proker)
                    ->withKategori($kategori)
                    ->withMitraDonations($mitraDonations)
                    ->withFundrisers($fundrisers)
                    ->withNews($news);
            }

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

    public function shownews(Request $request, $slug)
    {

        try {

            $proker = Proker::with('fundriser')->with('kategori')->where('url', $slug)->first();

            if (!$proker) {
                return abort(404, 'Proker tidak ditemukan');
            } else {

                $news = Penyaluran::where('penyaluran', $proker->id)
                    ->latest()
                    ->get();

                $kategori = Kategori::where('status','active')->get();

                return view('viewpublic.news')
                    ->withProker($proker)
                    ->withKategori($kategori)
                    ->withNews($news);
            }

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

    public function listProkerByKategori(Request $request, $type)
    {

        try {

            $kateg = Kategori::where('nama', $type)->first();           
            if($type=="Semua") {

                    $proker = Proker::with('mitra')->with('kategori')->where('status', 1)->limit(3)->get();
                    $kategori = Kategori::where('status','active')->get();            
    
                    return view('viewpublic.listdonasi',['proker'=>$proker,'type'=>$type, 'kategori'=>$kategori]);

            } if (!$kateg) {
                return abort(404, 'Kategori tidak ditemukan');
            }
            else {

                $proker = Proker::with('mitra')->with('kategori')->where('type',$kateg->id)->where('status', 1)->limit(3)->get();
                $kategori = Kategori::where('status','active')->get();            

                return view('viewpublic.listdonasi',['proker'=>$proker,'type'=>$kateg->nama, 'kategori'=>$kategori]);
            }

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
}
