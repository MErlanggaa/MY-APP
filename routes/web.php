<?php
use App\Http\Controllers\Supplier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Barang;
use App\Http\Controllers\Admin;
use App\Http\Middleware\CekUserLogin;
use App\Http\Controllers\Yayasan;


//supplier
Route::get('/supplier', [Supplier::class, 'index']);
Route::post('/supplier/save',[Supplier::class,'save']);
Route::delete('/supplier/hapus/{id}', [Supplier::class,'destroy']);
Route::get('/supplier/update/{id}', [Supplier::class, 'update']);

Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/proses', [Login::class, 'proses']);
Route::get('/logout', [Login::class,'logout']) ->name('logout');


Route ::group(['middleware'=>['auth']],function(){
    Route::group(['middleware' => ['cekUserLogin:1']],function(){
        Route::resource('admin', Admin::class);
    });
    Route::group(['middleware' => ['cekUserLogin:2']],function(){
        Route::resource('yayasan', Yayasan::class);
});
});
    

//barang
Route::post('/barang/save', [Barang::class, 'save']);
Route::delete('/barang/hapus/{id}', [Barang::class,'destroy']);
Route::post('/barang/update/{id}', [Barang::class, 'update']);

//Route::put('/barang/edit/{id}', [Barang :: class, 'edit']);
Route::get('/barang', [Barang::class,'index']);
Route::get('/about', function () {
    return view('about');
});
