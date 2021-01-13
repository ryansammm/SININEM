{!! Form::model($model, [
'route' => $model->exists ? ['user.update', $model->id] : 'user.store',
'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="col-md-12">
    <div class="form-group">
        <label>Nama Pengguna</label>
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Email</label>
        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Password</label>
        {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Level</label>
        {!! Form::select('level', ['admin' => 'Admin', 'dosen' => 'Dosen'], ['class' => 'form-control', 'id' => 'level']) !!}
    </div>
</div>

{!! Form::close() !!}
