@extends('layouts.default')
@section('content')



<div class="container">    
    <div class="row">
      <div class="col-md-10">

<form action="{{ route ('responsable.buscarpersona') }}" method="POST" >
    @csrf
    @method("PUT")
<input name="nombre"  id="nombre" class="form-control me-4" type="search" placeholder="Buscar Persona" aria-label="Search">
<button class="btn btn-outline-success" type="submit">Buscar</button>
</form>
</div>
</div>
</div>



@endsection