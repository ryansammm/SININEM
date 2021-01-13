{!! Form::model($model, [
'route' => $model->exists ? ['grade.update', $model->idnilai] : 'grade.store',
'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="col-md-12">
    <div class="form-group">
        <label>Nama</label>
        {{ Form::select('nim', $selectMhs, null, ['class' => 'form-control', 'id' => 'nim', 'placeholder' => 'Pilih Mahasiswa']) }}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Mata Kuliah</label>
        {{ Form::select('kode_matkul', $selectMatkul, null, ['class' => 'form-control', 'id' => 'kode_matkul', 'placeholder' => 'Pilih Matkul']) }}
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Tugas</label>
            {!! Form::text('tugas', null, ['class' => 'form-control', 'id' => 'tugas']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Kuis</label>
            {!! Form::text('quiz', null, ['class' => 'form-control', 'id' => 'quiz']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>UTS</label>
            {!! Form::text('uts', null, ['class' => 'form-control', 'id' => 'uts']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>UAS</label>
            {!! Form::text('uas', null, ['class' => 'form-control', 'id' => 'uas']) !!}
        </div>
    </div>
</div>


{!! Form::close() !!}