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
            <h1 class="m-0 text-dark">DATA TAHUN AKADEMIK</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Tahun Akademik</li>
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
                <h3 class="card-title">Data Tahun Akademik</h3>
                <div class="float-sm-right">
                <a href="{{ route('academicyear.create') }}" class="btn btn-primary btn-sm float-sm-right modal-show" title="Tambah Data Tahun Akademik">
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
                    <th>ID Akademik</th>
                    <th>Tahun Akademik</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody></tbody>

                  <tfoot>
                  <tr>
                    <th width="20">No.</th>
                    <th>ID Akademik</th>
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
      ajax: "{{ route('data.academicyear') }}",
      columns: [
        {data: 'DT_RowIndex', name: 'idacad'},
        {data: 'idacad', name: 'idacad'},
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