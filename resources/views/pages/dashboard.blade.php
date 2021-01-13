@extends('layout/nav_side_foot')
@section('title','Sistem Input Nilai')
@section('container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Info boxes -->
        
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <div class="col-md-4">                      
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success"><a class="iconh"><i class="fas fa-user-tie"></i></a></span>
              <div class="info-box-content">
                <span class="info-box-text">Dosen</span>
                <span class="info-box-number">{{ $data['dosen'] }}</span>
              </div>
            </div>            
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger "><a class="iconh"><i class="fas fa-users"></i></a></span>
              <div class="info-box-content">
                <span class="info-box-text">Mahasiswa</span>
                <span class="info-box-number">{{ $data['mhs'] }}</span>                
              </div>              
            </div>            
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info"><a class="iconh"><i class="fas fa-book"></i></a></span>
              <div class="info-box-content">
                <span class="info-box-text">Mata Kuliah</span>
                <span class="info-box-number">{{ $data['matkul'] }}</span>
              </div>             
            </div>
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info"><a class="iconh"><i class="fas fa-calendar"></i></a></span>
              <div class="info-box-content">
                <span class="info-box-text">Tahun Akademik</span>
                <span class="info-box-number"><?php $tgl=date('Y'); echo $tgl; ?> </span>
              </div>             
            </div>      
          </div><!-- /Col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @endsection
