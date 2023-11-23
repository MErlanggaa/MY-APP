<?php

namespace App\Http\Controllers;

use App\Models\Supplier as ModelsSupplier;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;


class Supplier extends Controller
{
    public function index(){
       $supplier = ModelsSupplier::all();
       $data = ['supplier' => $supplier];
        return view ('supplier.index', $data);
    }

    public function tambahSupplier (){
        return view('tambahSupplier');
    }
    //ModelsSupplier::create($request->except(['_token','simpan']));
    public function save(Request $request){
        DB::table('supplier') ->insert([
            'namaSupplier' => $request ->namaSupplier,
            'alamatSupplier' => $request ->alamatSupplier,
            'telpSupplier' => $request ->telpSupplier,
        ]);
        return redirect()->to(url('/supplier'))->with('dataTambah', 'Data Berhasil di Tambah');
    }
    public function destroy ($id){
        $supplier = ModelsSupplier::find($id);
        $supplier ->delete();
        return redirect () -> to(url('/supplier'));

    }
    public function edit ($id, Request $request){
        $supplier = ModelsSupplier::find($id);
        
        $supplier ->update($request ->except(['_token', 'simpan']));
        return redirect()->to(url('/supplier'));
        }

    public function update($id)
        {
            return view('supplier.edit',[
                'supplier' => ModelsSupplier::find($id)
            ]);
        }
        
    }
    

