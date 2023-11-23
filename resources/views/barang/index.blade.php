@extends('template.main')
@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
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
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Spesifikasi</th>
                    <th>Lokasi</th>
                    <th>Kondisi</th>
                    <th>Jumlah</th>
                    <th>Sumber Dana</th>
                    <th>Aksi</th>
            </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
    @foreach ($barang as $row)
            <tr>
                <td width="5%">{{$no++}}</td>
                <td>{{$row->id_barang}}</td> 
                <td>{{$row->nama_barang}}</td>
                <td>{{$row->spesifikasi}}</td>
                <td>{{$row->lokasi}}</td>
                <td><span class="badge badge-<?php if($row->kondisi == 'baru'){
                    echo 'primary';
                    }else{
                    echo 'danger';
                }?> p-1">{{$row->kondisi}}</span></td>
                <td>{{$row->jumlah_barang}}</td>
                <td>{{$row->sumber_dana}}</td>
                <td>
                <button class="btn btn-sm btn-primary btn-sm"id='edit' data-toggle="modal" data-target="#editData" data-kode='{{$row ->id_barang}}' data-nama='{{$row->nama_barang}}'data-spesifilasi='{{$row->spesifikasi}}' data-lokasi='{{$row->lokasi}}' data-kondisi='{{$row->kondisi}}' data-jumlah='{{$row->jumlah}}' data-sumber='{{$row->sumber_dana}}'>Edit</button>  <form action="{{ url('barang/hapus/'.$row->id) }}"  method = "POST" style="display: inline;"> <button class="btn btn-sm btn-primary ">Hapus</button></td>
            @csrf
            @method('delete')
            </form>
            </tr>
    @endforeach
 </tbody>
 </table>
 </div>
 </div>
 </div>
</div>
@endsection

@section('modals')
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modaldialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/barang/save" method="POST">
                    @csrf
                
                    <div class="form-group">
                        <label for="id_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="id_barang" aria-describedby="id_barang" name="id_barang">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" aria-describedby="nama_barang" name="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="spesifikasi">Spesifikasi</label>
                        <input type="text" class="form-control" id="spesifikasi" name="spesifikasi">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-control">
                            <option value="" selected>Pilih</option>
                            <option value="baru">Baru</option>
                            <option value="bekas">Bekas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang">
                    </div>
                    <div class="form-group">
                        <label for="sumber_dana">Sumber Dana</label>
                        <input type="text" class="form-control" id="sumber_dana" name="sumber_dana">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>


@foreach ($barang as $data)
<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modaldialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
               /<form action="/barang/update/{{$data->id}}" method="POST">
                    @csrf
                
                    <div class="form-group">
                        <label for="id_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="id_edit" aria-describedby="id_barang" name="id_barang">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_edit" aria-describedby="nama_barang" name="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="spesifikasi">Spesifikasi</label>
                        <input type="text" class="form-control" id="spesifikasi_edit" name="spesifikasi">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi_edit" name="lokasi">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select name="kondisi" id="kondisi_edit" class="form-control">
                            <option value="" selected>Pilih</option>
                            <option value="baru">Baru</option>
                            <option value="bekas">Bekas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah_edit" name="jumlah_barang">
                    </div>
                    <div class="form-group">
                        <label for="sumber_dana">Sumber Dana</label>
                        <input type="text" class="form-control" id="sumber_edit" name="sumber_dana">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Simpan" name="edit">
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
<script> 
    @if ($message = Session ::get('dataTambah'))
 const Toast  = Swal.mixin({
    toast:true,
    position :  'top-end',
    showConfirmButton : false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
 })
 Toast.fire({
    icon : 'success'
    title : 'Data Barang Berhasil Di Tambahkan'
 })
    @endif
</script>
<script>
    $(document).on('click', '#edit', function(e) {
        var kode = $(this).attr("data-kode");
        var nama = $(this).attr("data-nama");
        var spesifikasi = $(this).attr("data-spesifikasi");
        var lokasi = $(this).attr("data-lokasi");
        var jumlah = $(this).attr("data-jumlah");
        var sumber = $(this).attr("data-sumber");
        $('#id_edit').val(kode);
        $('#nama_edit').val(nama);
        $('#spesifikasi_edit').val(spesifikasi);
        $('#lokasi_edit').val(lokasi);
        $('#jumlah_edit').val(jumlah);
        $('#sumber_edit').val(sumber);
    });
</script>
@endsection
