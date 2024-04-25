@extends('layouts.default')

@section('content')

@if($errors->any())
<div>
    <strong>Algo salió mal:</strong><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success mt-2">
    <strong>{{ Session::get('success') }}</strong>
</div>
@endif
<div class="container-fluid">
    <form action="{{ route('dependenciaJerarquica.update', ['dependenciaJerarquica' => $depJerar->id_dep_jerar]) }}" method="post" class="dependenciaJerarquica-form">
        @csrf
        @method('PUT')

        <div class="form-section">
            <label for="nombre_dep_jerar">Nombre</label>
            <input type="text" class="form-control mb-3" name="nombre_dep_jerar" value="{{ $depJerar->nombre_dep_jerar }}" required>
            
            <label for="descrip_dep_jerar">Descripci&oacute;n</label>
            <input type="text" class="form-control mb-3" name="descrip_dep_jerar" value="{{ $depJerar->descrip_dep_jerar }}" required>
        </div>


        <div class="form-navigation mt-3">
            <button type="button" class="previous btn btn-primary float-left">&lt; Previous</button>
            <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
            <a href="{{ route('dependenciaJerarquica.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success float-right">Modificar</button>
        </div>
    </form>
</div>
@endsection
