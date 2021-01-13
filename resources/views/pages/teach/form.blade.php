{!! Form::model($model, [
'route' => $model->exists ? ['teach.update', $model->idteachs] : 'teach.store',
'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="col-md-12">
    <div class="form-group">
        <label>Pengampu</label>
        {{ Form::select('nidn', $selectDosen, null, ['class' => 'form-control', 'id' => 'nidn', 'placeholder' => 'Pilih Pengampu']) }}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Mata Kuliah</label>
        {{ Form::select('kode_matkul', $selectMatkul, null, ['class' => 'form-control', 'id' => 'kode_matkul', 'placeholder' => 'Pilih Matkul']) }}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Tahun Akademik</label>
        {{ Form::select('idacad', $selectAkademik, null, ['class' => 'form-control', 'id' => 'idacad', 'placeholder' => 'Pilih Tahun Akademik']) }}
    </div>
</div>


{!! Form::close() !!}
