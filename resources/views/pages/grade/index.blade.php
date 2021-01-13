@extends('layout/nav_side_foot')
@section('title','SIN | Nilai Mahasiswa')
@section('container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">NILAI MAHASISWA</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Nilai Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <a href="{{ route('grade.create') }}" class="btn btn-primary btn-sm float-sm-right modal-show" title="Tambah Data Nilai">
                  <i class="fas fa-plus"></i>  Tambah
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-striped">

                  <thead>
                  <tr >
                    <th width="20">No.</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Mata Kuliah</th>
                    <th>Tugas</th>
                    <th>Kuis</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Predikat</th>
                    <th width="60">Aksi</th>
                  </tr>
                  </thead>

                  <tbody></tbody>

                  <tfoot>
                  <tr>
                    <th width="20">No.</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Mata Kuliah</th>
                    <th>Tugas</th>
                    <th>Kuis</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Predikat</th>
                    <th width="60">Aksi</th>
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
      ajax: "{{ route('data.grade')}}",
      columns: [
        {data: 'DT_RowIndex', name: 'idnilai'},
        {data: 'nim', name: 'nim'},
        {data: 'nama', name: 'nama'},
        {data: 'mata_kuliah', name: 'mata_kuliah'},
        {data: 'tugas', name: 'tugas'},
        {data: 'quiz', name: 'quiz'},
        {data: 'uts', name: 'uts'},
        {data: 'uas', name: 'uas'},
        {data: 'grade', name: 'grade'},
        {data: 'action', name: 'action'}
      ]

    });
  });
  </script>
  @endpush