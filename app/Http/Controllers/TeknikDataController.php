<?php

namespace App\Http\Controllers;

use App\Models\Is;
use App\Models\TeknikData;
use Illuminate\Http\Request;

class TeknikDataController extends Controller
{

    public function index(Is $isler)
    {
        $teknikdata = TeknikData::where('is_id', $isler->id)->first();
        return view('teknikdata.index', compact('isler', 'teknikdata'));
    }


    public function create(Is $isler)
    {
        return view('teknikdata.create', compact('isler'));
    }

    public function store(Request $request, Is $isler)
    {
        $data = $request->validate([
            'sistem_tipi' => 'nullable|string',
            'sogutma_burcu' => 'nullable|string',
            'nozzle_adedi' => 'nullable|string',
            'nozzle_capi' => 'nullable|string',
            'kalip_goz_adedi' => 'nullable|string',
            'giris_capi' => 'nullable|string',
            'sr_alani' => 'nullable|string',
            'parca_gramaji' => 'nullable|string',
            'parca_et_kalinligi' => 'nullable|string',
            'malzeme_bilgisi' => 'nullable|string',
            'parca_gorselligi' => 'nullable|in:evet,hayir',
        ]);

        $data['is_id'] = $isler->id;
        TeknikData::create($data);

        return redirect()->route('isler.teknikdata.index', $isler->id)->with('success', 'Teknik veri eklendi.');
    }

    public function edit(Is $isler, TeknikData $teknikdata)
    {
        $teknikdata = TeknikData::where('is_id', $isler->id)->first();

        return view('teknikdata.edit', compact('isler', 'teknikdata'));
    }

    public function update(Request $request, Is $isler, TeknikData $teknikdata)
    {
        $teknikdata = TeknikData::where('is_id', $isler->id)->first();

        $data = $request->validate([
            'sistem_tipi' => 'nullable|string',
            'sogutma_burcu' => 'nullable|string',
            'nozzle_adedi' => 'nullable|string',
            'nozzle_capi' => 'nullable|string',
            'kalip_goz_adedi' => 'nullable|string',
            'giris_capi' => 'nullable|string',
            'sr_alani' => 'nullable|string',
            'parca_gramaji' => 'nullable|string',
            'parca_et_kalinligi' => 'nullable|string',
            'malzeme_bilgisi' => 'nullable|string',
            'parca_gorselligi' => 'nullable|in:evet,hayir',
        ]);

        $teknikdata->update($data);

        return redirect()->route('isler.teknikdata.index', $isler->id)->with('success', 'Teknik veri güncellendi.');
    }

    public function destroy(Is $isler, TeknikData $teknikdata)
    {
        $teknikdata->delete();
        return back()->with('success', 'Teknik veri silindi.');
    }

}
