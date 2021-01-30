@extends('layout.app')

@section('title', 'Absensi')

@section('content')
<!-- DataTales Example -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus fa-sm text-white-50"></i>
              Tambah
            </button> 
          </div>

          <!-- Content Row -->
          <div class="row">
          </div>
          <!-- /.container-fluid -->
  
        
  

<div class="card shadow mb-4">
            <div class="card-header py-3">  
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Waktu Absen</th>
                      <th>Mahasiswa ID</th> 
                      <th>Mata Kuliah ID </th>
                      <th>Keterangan</th>
                    </tr>
                <tbody>
                  @foreach($Absen as $ab)
                  <tr>

                    <td> {{ $ab['waktu_absen'] }} </td>
                    <td> {{ $ab['mahasiswa_id'] }} </td>
                    <td> {{ $ab['matkul_id'] }} </td>
                    <td> {{ $ab['keterangan'] }} </td>
                    <td> <a href="/absen/{{ $ab['id'] }}/edit">Edit Data
                    </td>
                    <td> <form action="/absen/{{ $ab['id'] }}" method="post">
                       @csrf
                      @method('DELETE')
                      <button class="card-link btn-danger">Hapus Data</button> </td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>

          </div>
        <!-- End of Main Content -->

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/absen" method="POST">

          @csrf

      <div class="modal-body">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Waktu Absen</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="waktu_absen" name="waktu_absen">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Mahasiswa ID</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="mahasiswa_id" name="mahasiswa_id">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Mata Kuliah ID</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="matkul_id" name="matkul_id">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>
          </div>
        
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Input</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
