<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Is;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Is $isler)
    {
        $files = $isler->files()->latest()->get();
        return view('files.index', compact('isler', 'files'));
    }

    public function create(Is $isler)
    {
        return view('files.create', compact('isler'));
    }

    public function store(Request $request, Is $isler)
    {
        $request->validate([
            'dosya' => 'required|file|max:10240',
        ]);

        $path = $request->file('dosya')->store('dosyalar', 'public');

        File::create([
            'is_id' => $isler->id,
            'dosya_adi' => $request->file('dosya')->getClientOriginalName(),
            'dosya_yolu' => $path,
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy(Is $isler, File $file)
    {
        Storage::disk('public')->delete($file->dosya_yolu);
        $file->delete();

        return redirect()->route('isler.files.index', $isler)->with('success', 'Dosya silindi.');
    }
}