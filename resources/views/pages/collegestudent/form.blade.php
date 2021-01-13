{!! Form::model($model, [
  'route' => $model->exists ? ['collegestudent.update', $model->nim] : 'collegestudent.store',
  'method' => $model->exists ? 'PUT' : 'POST'
]) !!} 
            <div class="form-group">
              <label>NIM</label>
              {!! Form::text('nim', null, ['class' => 'form-control', 'id' => 'nim']) !!}
            </div>
            <div class="form-group">
              <label>Nama Mahasiswa</label>
              {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama']) !!}
            </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label>Program Studi</label>
                {!! Form::select('program_studi', ['Teknik Informatika' => 'Teknik Informatika', 'Sistem Informasi' => 'Sistem Informasi', 'Manajemen Informatika' => 'Manajemen Informatika'], 'program_studi', ['class' => 'form-control', 'id' => 'program_studi']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Kelas</label>
                {!! Form::text('kelas', null, ['class' => 'form-control', 'id' => 'kelas', 'placeholder' => 'Contoh : TI-VII B']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Jenis Kelamin</label>
                {!! Form::select('jk', ['laki-laki' => 'Laki-Laki', 'perempuan' => 'Perempuan'], 'laki-laki', ['class' => 'form-control', 'id' => 'jk']) !!}
            </div>
        </div>
    </div>

{!! Form::close() !!}