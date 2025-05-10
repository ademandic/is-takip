<?php

namespace App\Http\Controllers;

use App\Models\Is;
use App\Models\Teklif;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Yukarıya ekle
use App\Models\TeknikData;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class TeklifController extends Controller
{
public function index(Is $isler)
{
    $teklifler = $isler->teklifler()->latest()->get();
    return view('teklifler.index', compact('isler', 'teklifler'));
}

public function create(Is $isler)
{
    return view('teklifler.create', compact('isler'));
}

public function store(Request $request, Is $isler)
{
    $request->validate([
        'teklif_no' => 'required|string|max:255',
        'aciklama' => 'nullable|string',
        'tutar' => 'nullable|numeric',
        'alis_tutar' => 'nullable|numeric',
    ]);

    $isler->teklifler()->create($request->only('teklif_no', 'aciklama', 'tutar', 'alis_tutar'));

    return redirect()->route('isler.teklifler.index', $isler->id)->with('success', 'Teklif başarıyla eklendi!');
}

public function edit(Is $isler, Teklif $teklif)
{
    return view('teklifler.edit', compact('isler', 'teklif'));
}

public function update(Request $request, Is $isler, Teklif $teklif)
{
    $request->validate([
        'teklif_no' => 'required|string|max:255',
        'aciklama' => 'nullable|string',
        'tutar' => 'nullable|numeric',
        'alis_tutar' => 'nullable|numeric',
    ]);

    $teklif->update($request->only('teklif_no', 'aciklama', 'tutar', 'alis_tutar'));

    return redirect()->route('isler.teklifler.index', $isler->id)->with('success', 'Teklif başarıyla güncellendi!');
}

    public function destroy(Is $isler, Teklif $teklif)
    {
        $teklif->delete();

        return redirect()->route('isler.teklifler.index', $isler->id)->with('success', 'Teklif başarıyla silindi!');
    }

    public function pdf(Is $isler, Teklif $teklif, TeknikData $teknikdata)
    {
        $teknikdata = TeknikData::where('is_id', $isler->id)->first();

        Pdf::setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
        ]);

        $pdf = Pdf::loadView('teklifler.pdf', compact('isler', 'teklif', 'teknikdata'));

        $dosyaAdi = 'Teklif_' . $isler->is_no . '_' . now()->format('Ymd_His') . '.pdf';
        $dosyaPath = 'dosyalar/' . $dosyaAdi;

        Storage::disk('public')->put($dosyaPath, $pdf->output());

        File::create([
            'is_id' => $isler->id,
            'dosya_adi' => $dosyaAdi,
            'dosya_yolu' => $dosyaPath,
        ]);

        return $pdf->download($dosyaAdi);
    }

}