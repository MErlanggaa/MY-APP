@extends('template.main')
@section('konten')

<!-- Assuming $supplier is an instance of ModelsSupplier in your controller -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Barang Supplier</h1>
    <p class="mb-4">Manajemen barang | Inventory Barang</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CRUD Laravel
             
            </h6>
<form action="/supplier/edit/{{$supplier->id}}" method="POST">

    @csrf
    @method('put')
    Nama Supplier
    <input type="text" name="namaSupplier" placeholder="Nama Supplier" value="{{ $supplier->namaSupplier }}"><br>
    Alamat Supplier
    <input type="text" name="alamatSupplier" placeholder="Alamat Supplier" value="{{ $supplier->alamatSupplier }}"> <br>
    Telepon Supplier
    <input type="text" name="telpSupplier" placeholder="Telepon Supplier" value="{{ $supplier->telpSupplier }}"> <br> <br>
    <input type="submit" name="simpan" value="simpan">
</form>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
<script src="../template/vendor/jquery/jquery.min.js"></script>
<link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="../template/css/sb-admin2.min.css" rel="stylesheet">
<link href="../template/vendor/datatables/dataTables/boostrap4.min.css" rel="stylesheet">



<script>
@if ($message = Session::get('dataTambah'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        Toast.fire({
            icon: 'success',
            title: 'Data Barang Berhasil Ditambahkan'
        });
    </script>
@endif


</script>
@endsection
