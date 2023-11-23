<?php

namespace App\Http\Controllers;

use App\Models\BarangModels;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index()
    {
        $barang = BarangModels::all();

        return view('barang.index', compact('barang'));
    }
}

