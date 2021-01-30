@extends('layout.app')

@section('title', 'Mata Kuliah')

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
                      <th>Nama Mata Kuliah</th>
                      <th>SKS</th> 
                    </tr>
                <tbody>
                  @foreach($Matkul as $matkul)
                  <tr>

                    <td> {{ $matkul['nama_matakuliah'] }} </td>
                    <td> {{ $matkul['sks'] }} </td>
                    <td> <a href="/mahasiswa/{{ $matkul['id'] }}/edit">Edit Data
                    </td>
                    <td> <form action="/mahasiswa/{{ $matkul['id'] }}" method="post">
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
      <form action="/matkul" method="POST">

          @csrf

      <div class="modal-body">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Mata Kuliah</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">SKS</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="sks" name="sks">
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
