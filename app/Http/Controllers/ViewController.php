<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Auth;
use App\Donasi;
use App\User;
use App\Totaldonasi;
use App\Proker;
use App\Banner;
use App\Kategori;
use App\Kegiataninfak;
use App\Rekening;


class ViewController extends Controller
{

    public function index()
    {

        try {

            $totaldata = Donasi::where('status', '=', 'sampai')->count();
            $banner = Cache::remember("banner", 10 * 30, function () {
                return Banner::get();
            });

            $kategori = Kategori::where('status', 'active')->get();

            $proker = Proker::where('status', 1)->first();

            $urgent = Cache::remember("urgent", 10 * 30, function () {
                return Proker::where('is_urgent', 1)->where('status', 1)->get();
            });


            $infak = Cache::remember("infak", 10 * 30, function () {
                return Proker::with('mitra')->where('status', 1)->limit(3)->skip(0)->get();
            });

            return view('viewpublic.index', 
                [
                    'urgent' => $urgent,
                    'infak' => $infak,
                    'kategori' => $kategori,
                    'donasiuser' => $totaldata,
                    'banner' => $banner,
                    'proker' => $proker,
                ]
            );
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

    /*
    public function index()
    {
    	$totaldata = \App\Donasi::where('status', '=', 'sampai')->count();
    	$totaldonatur = \App\User::count();
        $totaldonasi = \App\Totaldonasi::findOrfail(1);
        $proker =\App\Proker::get();

    	return view('viewpublic.index', ['totaldonasi' => $totaldonasi, 'donasiuser' => $totaldata, 'totaldonatur'=> $totaldonatur, 'proker' => $proker ]);
    }
    */

    public function kalkulatorzakat()
    {

        $rekenings = Rekening::where('tipe','transfer_manual')->where('status', 1)->get();
        $vas = Rekening::where('tipe','payment_gateway')->where('status', 1)->get();
        $instans = Rekening::where('tipe','instant_payment')->where('status', 1)->get();

        return view('viewpublic.kalkulator-zakat',['instans'=>$instans,'vas' => $vas, 'rekenings' => $rekenings]);
    
    }

    public function doazakat()
    {
        return view('viewpublic.doa-zakat');
    }

    public function faqpage()
    {
        return view('viewpublic.faq');
    }

    public function searchpage()
    {
        return view('viewpublic.search');
    }

    public function about()
    {
        return view('viewpublic.about');
    }

    public function zohoverify()
    {

        return view('verifyforzoho');
    }

    public function privacy()
    {
        return view('viewpublic.privacy');
    }

    public function termandpolicy()
    {
        return view('viewpublic.termandpolicy');
    }

    public function load(Request $request)
    {
        try {
            
            $apiKey = $request->header('token');
            // $csrf_token = $request->session()->token();
            if (false) {
                 return response()->json(['status' => false, 'message' => "Your request has empty key"]);
            }

            $page = 1;
            if ($request->has('page')) {
                $page = $request->page;
                if ($page == 0) {
                    $page = 1;
                }
            }
            
            $skip =  ($page-1) * 3;

            $type = $request->kategori;

            $kategori = Kategori::where('nama', $type)->first();
            $data_load = null;

            if ($kategori == null) {
                $data_load = Proker::with('mitra')->with('kategori')
                    ->where('status', 1)
                    ->limit(3)
                    ->skip($skip)
                    ->orderBy('urutan') 
                    ->latest()
                    ->get();
            } else {
                $data_load =  Proker::with('mitra')->with('kategori')
                    ->where('type', $kategori->id)
                    ->where('status', 1)
                    ->limit(3)
                    ->skip($skip)
                    ->orderBy('urutan') 
                    ->latest()
                    ->get();
            }

            $next_page_url = url('/api/load?page=') . ($page + 1);

            return response()->json([
                'status' => true,
                'page' => $page + 1,
                'next_page_url' => $next_page_url,
                'data' => $data_load
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
        } catch (\PDOException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
        }
    }

    public function search(Request $request)
    {
        try {

            $apiKey = $request->header('token');
            // $csrf_token = $request->session()->token();
            if (false) {
                 return response()->json(['status' => false, 'message' => "Your request has empty key"]);
            }

            $kunci = "";
            if ($request->has('search')) {
                $kunci = $request->search;
            }

            $data_search = Cache::remember("data_search" . $kunci, 10 * 30, function () use ($kunci) {

                return Proker::with('mitra')->with('kategori')
                    ->where('nama_kegiatan', 'like', '%' . $kunci . '%')
                    ->where('status', 1)
                    ->limit(3)
                    ->skip(0)
                    ->orderBy('urutan') 
                    ->latest()
                    ->get();
            });

            return response()->json([
                'status' => true,
                'search_results' => $data_search
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
        } catch (\PDOException $e) {
            $message = $e->getMessage() . ". File " . $e->getFile() . ". Line " . $e->getLine();
            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
        }
    }

    public function getUserCache()
    {
        $query = Cache::remember("user_all", 10 * 60, function () {
            return User::all();
        });

        foreach ($query as $q) {
            echo "<li>{$q->name}</li>";
        }
    }
    public function getUser()
    {
        $query = User::all();
        foreach ($query as $q) {
            echo "<li>{$q->name}</li>";
        }
    }
}
