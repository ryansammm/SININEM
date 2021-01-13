{!! Form::model($model, [
  'route' => $model->exists ? ['course.update', $model->kode_matkul] : 'course.store',
  'method' => $model->exists ? 'PUT' : 'POST'
]) !!} 

    <div class="col-md-12">
      <div class="form-group">
        <label>Kode Mata Kuliah</label>
        {!! Form::text('kode_matkul', null, ['class' => 'form-control', 'id' => 'kode_matkul']) !!}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Mata Kuliah</label>
        {!! Form::text('mata_kuliah', null, ['class' => 'form-control', 'id' => 'mata_kuliah']) !!}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>SKS</label>
        {!! Form::text('sks', null, ['class' => 'form-control', 'id' => 'sks']) !!}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Semester</label>
        {!! Form::text('semester', null, ['class' => 'form-control', 'id' => 'semester']) !!}
      </div>
    </div>

{!! Form::close() !!}