@extends('layouts.default') <!-- Asegúrate de tener un layout definido en resources/views/layouts -->



@section('content')

@if($errors->any())
<div>
    <strong>Algo </strong> salio mal ... <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    
</div>
@endif
@if (Session::get('success'))
<div class="alert alert-success mt-2">
    <strong>{{ Session::get('success') }}</strong>

</div>
@endif

<div class="container-fluid">
    <form action="{{route('dependenciaJerarquica.store')}}"  method="post" class="dependenciasJerarquicas-form">
        @csrf
    <div class="form-section">
        <label for="">Nombre de la Unidad:</label>
        <input type="text" class="form-control mb-3" name="nombre_dep_jerar" value="{{ old('nombre_dep_jerar') }}" required>
        <label for="">Direccion</label>
        <input type="text" class="form-control mb-3" name="descrip_dep_jerar" value="{{ old('descrip_dep_jerar') }}" required>
    </div>
    <div class="form-navigation mt-3">
        <button type="button" class="previous btn btn-primary float-left">&lt; Previous</button>
        <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
        <a href="{{ route('dependenciaJerarquica.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-success float-right">Submit</button>
    </div>

    </form>
</div>

@endsection