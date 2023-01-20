<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Mitra;
use App\Kategori;
use App\Proker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;


class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $campaigns = Proker::where('created_by', Auth::id())
            ->with('kategori:id,nama')
            ->get();

        return view('usercampaigns.index')
            ->withCampaigns($campaigns);
    }

    public function create()
    {
        $categories = Kategori::select('id', 'nama')->get();

        return view('usercampaigns.create')
            ->withCategories($categories);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string',
            'tag' => 'required|string',
            'type' => 'required|exists:kategories,id',
            'deskripsi' => 'required|string',
            'target' => 'required|numeric',
            'target_date' => 'required|date',
            'dokumentasi' => 'required|image',
        ]);

        $admin = Mitra::first();
        $validated['created_by'] = Auth::user()->id;
        $validated['dokumentasi'] = $request->file('dokumentasi')->store('fotobeasiswa', 'public');

        $targetDate = new Carbon($request->target_date, 'Asia/Jakarta');
        $validated['target_day'] = $targetDate->diffInDays();
        $validated['left_day'] = $targetDate->diffInDays();

        $validated['actual_earn'] = 0;
        $validated['is_pilihan'] = 0;
        $validated['url'] = self::prokerUrl($request->nama_kegiatan);
        $validated['fundriser_id'] = Auth::user()->id;

        Proker::create($validated);
        Cache::flush();

        return redirect()->route('campaigns.index');
    }

    public function show($id)
    {
        $user=Auth::user();

        $campaign = Proker::with('kategori:id,nama')->where('id',$id)->where('created_by',$user->id)->first();

        if (!$campaign) {
            abort(404, 'Campaign tidak ditemukan');
        }

        return view('usercampaigns.show')
            ->withCampaign($campaign);
    }

    public function edit(Proker $campaign)
    {

        $user=Auth::user();
        $campaign = Proker::with('kategori:id,nama')->where('id',$campaign->id)->where('created_by',$user->id)->first();

        if (!$campaign) {
            abort(404, 'Campaign tidak ditemukan');
        }

        $categories = Kategori::select('id', 'nama')->get();

        return view('usercampaigns.edit')
            ->withCampaign($campaign)
            ->withCategories($categories);
    }

    public function update(Request $request, Proker $campaign)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string',
            'tag' => 'required|string',
            'type' => 'required|exists:kategories,id',
            'deskripsi' => 'required|string',
            'target' => 'required|numeric',
            'target_date' => 'required|date',
            'dokumentasi' => 'nullable|image',
        ]);

        if ($request->has('dokumentasi')) {
            $validated['dokumentasi'] = $request->file('dokumentasi')->store('fotobeasiswa', 'public');
            Storage::disk('public')->delete($campaign->dokumentasi);
        }

        $targetDate = new Carbon($request->target_date, 'Asia/Jakarta');
        $validated['target_day'] = $targetDate->diffInDays();
        $validated['left_day'] = $targetDate->diffInDays();
        $validated['url'] = self::prokerUrl($request->nama_kegiatan);

        $campaign->update($validated);
        Cache::flush();

        return redirect()->route('campaigns.index');
    }

    public function destroy(Proker $campaign)
    {
        $campaign->delete();
        return redirect()->route('campaigns.index');
    }

    public static function prokerUrl($namaKegiatan, $first = true)
    {
        $url = strtolower($namaKegiatan);
        $url = preg_replace('/[^a-zA-Z]/', "-", $url);

        if (!$first) {
            $url .= '-' . rand(11, 99);
        }

        $check = Proker::where('url', $url)->count();

        if ($check) {
            self::prokerUrl($namaKegiatan, false);
        }

        return $url;
    }
}
