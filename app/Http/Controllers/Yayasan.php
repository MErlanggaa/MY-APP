<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\BarangModels;

class Yayasan extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->level != 2) {
            return redirect()->intended('login');
        }

        $barang = BarangModels::all();

        return view('barang.index', compact('barang'));
    }
}
