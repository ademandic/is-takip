<?php

namespace App\Http\Controllers;

use App\Models\Musteri;
use Illuminate\Http\Request;

class MusteriController extends Controller
{
    public function index()
    {
        $musteriler = Musteri::latest()->get();
        return view('musteriler.index', compact('musteriler'));
    }

    public function create()
    {
        return view('musteriler.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'ad' => 'required|string|max:255',
        'musteri_unvan' => 'nullable|string|max:255',
        'tipi' => 'nullable|string|max:255',
        'adres' => 'nullable|string',
        'ilgili_kisi' => 'nullable|string|max:255',
        'ilgili_kisi_email' => 'nullable|email|max:255',
    ]);

    Musteri::create($request->only([
        'ad', 
        'musteri_unvan', 
        'tipi', 
        'adres', 
        'ilgili_kisi', 
        'ilgili_kisi_email'
    ]));

    return redirect()->route('musteriler.index')->with('success', 'Müşteri başarıyla eklendi!');
    }

    public function edit($id, Musteri $musteri)
    {
        $musteri = Musteri::where('id', '=', $id)->first();
        return view('musteriler.edit', compact('musteri'));
    }

    public function update($id, Request $request, Musteri $musteri)
    {

        $musteri = Musteri::where('id', '=', $id)->first();

        $request->validate([
            'ad' => 'required|string|max:255',
            'musteri_unvan' => 'nullable|string|max:255',
            'tipi' => 'nullable|string|max:255',
            'adres' => 'nullable|string',
            'ilgili_kisi' => 'nullable|string|max:255',
            'ilgili_kisi_email' => 'nullable|email|max:255',
        ]);

        $musteri->update($request->only([
            'ad', 
            'musteri_unvan', 
            'tipi', 
            'adres', 
            'ilgili_kisi', 
            'ilgili_kisi_email'
        ]));

        return redirect()->route('musteriler.index')->with('success', 'Müşteri başarıyla güncellendi!');
    }

    public function destroy($id, Musteri $musteri)
    {
        $musteri = Musteri::where('id', '=', $id)->first();
        $musteri->delete();

        return redirect()->route('musteriler.index')->with('success', 'Müşteri başarıyla silindi!');
    }
}