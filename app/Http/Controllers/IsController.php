<?php

namespace App\Http\Controllers;

use App\Models\Is;
use App\Models\Musteri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsController extends Controller
{
    public function index()
    {
        $isler = Is::with('musteri', 'user')->latest()->get();
        return view('isler.index', compact('isler'));
    }

    public function create()
    {
        $musteriler = Musteri::all();
        return view('isler.create', compact('musteriler'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'is_no' => 'required|unique:isler,is_no',
            'musteri_id' => 'required|exists:musteriler,id',
            'musteri_referans_no' => 'nullable',
        ]);

        Is::create([
            'is_no' => $request->is_no,
            'musteri_id' => $request->musteri_id,
            'musteri_referans_no' => $request->musteri_referans_no,
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