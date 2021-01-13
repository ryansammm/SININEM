@extends('layout/nav_side_foot')
@section('title','SIN | Data Mahasiswa')
@section('container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DATA MAHASISWA</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" >
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Mahasiswa</h3>
                <div class="float-sm-right">
                  <a href="{{ route('collegestudent.create') }}" class="btn btn-primary btn-sm float-sm-right modal-show" title="Tambah Data Mahasiswa">
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
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody><tfoot>
                  <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
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
  <!-- /.content-wrapper -->

@endsection
@push('js')
  <script>
  $(function () {
    $("#table").DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: "{{ route('data.collegestudent') }}",
      columns: [
        {data: 'DT_RowIndex', name: 'nim'},
        {data: 'nim', name: 'nim'},
        {data: 'nama', name: 'nama'},
        {data: 'program_studi', name: 'program_studi'},
        {data: 'kelas', name: 'kelas'},
        {data: 'jk', name: 'jk'},
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