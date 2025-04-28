<?php

namespace App\Http\Controllers;

use App\Models\Is;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $isler = Is::with('musteri', 'user')->latest()->get();
        return view('home', compact('isler'));
    }
}