@extends('roles.layout')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="{{ route('roles.update', ['id' => $role->id]) }}">
    @csrf
    @method('PATCH')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $role->name }}" placeholder="Name" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br>
                @foreach($permission as $value)
                    <label>
                    <input type="checkbox" name="permission[]" value="{{ $value->id }}" {{ $rolePermissions->contains('id', $value->id) ? 'checked' : '' }}>
                     {{ $value->name }}
                    </label><br>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-primary" href="{{ route('roles.index') }}">Retour</a>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</form>


@endsection
<p class="text-center text-primary"><small>DIrection Générale des Douanes</small></p>