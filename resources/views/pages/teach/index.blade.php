@extends('layout/nav_side_foot')
@section('title','SIN | Mata Kuliah')
@section('container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DATA PENGAMPU</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Pengampu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengampu</h3>
                <div class="float-sm-right">
                <a href="{{ route('teach.create') }}" class="btn btn-primary btn-sm float-sm-right modal-show" title="Tambah Data Pengampu">
                    <i class="fas fa-plus"></i>  Tambah
                </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th width="20">No.</th>
                    <th>ID Pengampu</th>
                    <th>Pengampu</th>
                    <th>Mata Kuliah</th>
                    <th>Tahun Akademik</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody></tbody>

                  <tfoot>
                  <tr>
                    <th width="20">No.</th>
                    <th>ID Pengampu</th>
                    <th>Pengampu</th>
                    <th>Mata Kuliah</th>
                    <th>Tahun Akademik</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  @endsection
  @push('js')
  <script>
  $(function () {
    $("#table").DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: "{{ route('data.teach') }}",
      columns: [
        {data: 'DT_RowIndex', name: 'idteachs'},
        {data: 'idteachs', name: 'idteachs'},
        {data: 'nama_dosen', name: 'nama_dosen'},
        {data: 'mata_kuliah', name: 'mata_kuliah'},
        {data: 'tahun_akademik', name: 'tahun_akademik'},
        {data: 'action', name: 'action'}
      ]

    });
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  </script>
  @endpush