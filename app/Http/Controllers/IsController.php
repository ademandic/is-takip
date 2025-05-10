<?php

namespace App\Http\Controllers;

use App\Models\Is;
use App\Models\Musteri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsController extends Controller
{
    public function index(Request $request)
    {
        $query = Is::query()->with(['musteri', 'user']);

        if ($request->filled('arama')) 
        {
            $arama = $request->input('arama');
            $query->where('is_no', 'like', "%{$arama}%")
                  ->orWhere('musteri_referans_no', 'like', "%{$arama}%")
                  ->orWhere('sistem_id_no', 'like', "%{$arama}%")
                  ->orWhereHas('musteri', function ($q) use ($arama) {
                      $q->where('ad', 'like', "%{$arama}%");
                  });
        }
    
        $isler = $query->orderByDesc('created_at')->get();
    
        return view('isler.index', compact('isler'));
    }

    public function create()
    {
        $sonIs = \App\Models\Is::where('is_no', 'like', 'UTR-%')
        ->orderByDesc('id')
        ->first();

        if($sonIs && preg_match('/UTR-(\\d+)/', $sonIs->is_no, $matches)) 
            $yeniNumara = intval($matches[1]) + 1;
        else 
            $yeniNumara = 100;

        $yeniIsNo = 'UTR-' . str_pad($yeniNumara, 2, '0', STR_PAD_LEFT);

        $musteriler = Musteri::all();
        return view('isler.create', compact('musteriler', 'yeniIsNo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'is_no' => 'required|unique:isler,is_no',
            'musteri_id' => 'required|exists:musteriler,id',
            'musteri_referans_no' => 'nullable',
            'sistem_id_no' => 'nullable',
        ]);

        Is::create([
            'is_no' => $request->is_no,
            'musteri_id' => $request->musteri_id,
            'musteri_referans_no' => $request->musteri_referans_no,
            'sistem_id_no' => $request->sistem_id_no,
            'user_id' => Auth::id(),
            'kayit_tarihi' => now(),
        ]);

        return redirect()->route('isler.index')->with('success', 'İş başarıyla eklendi!');
    }

    public function edit(Is $is)
    {
        $musteriler = Musteri::all();
        return view('isler.edit', compact('is', 'musteriler'));
    }

    public function update(Request $request, Is $is)
    {
        $request->validate([
            'is_no' => 'required|unique:isler,is_no,'.$is->id,
            'musteri_id' => 'required|exists:musteriler,id',
            'musteri_referans_no' => 'nullable',
        ]);

        $is->update([
            'is_no' => $request->is_no,
            'musteri_id' => $request->musteri_id,
            'musteri_referans_no' => $request->musteri_referans_no,
        ]);

        return redirect()->route('isler.index')->with('success', 'İş başarıyla güncellendi!');
    }

    public function destroy(Is $is)
    {
        $is->delete();

        return redirect()->route('isler.index')->with('success', 'İş başarıyla silindi!');
    }
}