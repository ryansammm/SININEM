{!! Form::model($model, [
'route' => $model->exists ? ['academicyear.update', $model->idacad] : 'academicyear.store',
'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="col-md-12">
    <div class="form-group">
        <label>Tahun Akademik</label>
        {{ Form::text('tahun_akademik', null, ['class' => 'form-control', 'id' => 'tahun_akademik', 'placeholder' => 'contoh : 2020/2021 ']) }}
    </div>
</div>

{!! Form::close() !!}
