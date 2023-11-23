@extends('template.main')
@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Barang Supplier</h1>
    <p class="mb-4">Manajemen barang | Inventory Barang</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CRUD Laravel
                <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($supplier as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->namaSupplier }}</td>
                                <td>{{ $row->alamatSupplier }}</td>
                                <td>{{ $row->telpSupplier }}</td>
                                <td>
                                <a href="{{ url('supplier/update/'.$row->id) }}" class="btn btn-sm btn-primary float-left">Edit</a>
                    <form action="{{ url('supplier/hapus/'.$row->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-primary">Hapus</button>
</form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modaldialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('supplier/save') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="namaSupplier">Nama Supplier</label>
                        <input type="text" class="form-control" id="namaSupplier" aria-describedby="namaSupplier" name="namaSupplier">
                    </div>
                    <div class="form-group">
                        <label for="alamatSupplier">Alamat Supplier</label>
                        <input type="text" class="form-control" id="alamatSupplier" aria-describedby="alamatSupplier" name="alamatSupplier">
                    </div>
                    <div class="form-group">
                        <label for="telpSupplier">Telepon Supplier</label>
                        <input type="text" class="form-control" id="telpSupplier" aria-describedy="telpSupplier" name="telpSupplier">
                    </div>
            </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="simpan" name="simpan">
                </form>
                </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
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
