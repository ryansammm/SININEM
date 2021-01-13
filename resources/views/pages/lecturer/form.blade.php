{!! Form::model($model, [
'route' => $model->exists ? ['lecturer.update', $model->nidn] : 'lecturer.store',
'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
<div class="form-group">
    <label>NIDN</label>
    {!! Form::text('nidn', null, ['class' => 'form-control', 'id' => 'nidn']) !!}
</div>
<div class="form-group">
    <label>Nama Dosen</label>
    {!! Form::text('nama_dosen', null, ['class' => 'form-control', 'id' => 'nama_dosen']) !!}
</div>
<div class="form-group">
    <label>E-mail</label>
    {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
</div>
<div class="form-group">
    <label>No HP</label>
    {!! Form::text('nohp', null, ['class' => 'form-control', 'id' => 'nohp']) !!}
</div>

{!! Form::close() !!}
