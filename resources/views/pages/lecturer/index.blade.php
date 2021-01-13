@extends('layout/nav_side_foot')
@section('title','SIN | Data Dosen')
@section('container')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DATA DOSEN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Dosen</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Dosen</h3>
                <div class="float-sm-right">
                  <a href="{{ route('lecturer.create') }}" class="btn btn-primary btn-sm float-sm-right modal-show" title="Tambah Data Dosen">
                    <i class="fas fa-plus"></i>  Tambah
                </a>
                </div>
              </div>
              <div class="card-body">
                <table id="table" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th width="20">No.</th>
                    <th>NIDN</th>
                    <th>Nama Dosen</th>
                    <th>E-mail</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody></tbody>

                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>NIDN</th>
                    <th>Nama Dosen</th>
                    <th>E-mail</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
  @push('js')
  <script>
  $(function () {
    $("#table").DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: "{{ route('data.lecturer') }}",
      columns: [
        {data: 'DT_RowIndex', name: 'nidn'},
        {data: 'nidn', name: 'nidn'},
        {data: 'nama_dosen', name: 'nama_dosen'},
        {data: 'email', name: 'email'},
        {data: 'nohp', name: 'nohp'},
        {data: 'action', name: 'action'}
      ]

    });
  });
  </script>
  @endpush