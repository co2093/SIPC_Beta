@extends('layouts.default')
@section('content')

<div class="card">
    <h5 class="card-header"> Eliminar registro </h5>
    <div class="card-body">
        <p class="card-text">
            <div class="alert alert-danger" role="alert">
               <h3>Esta seguro que desea eliminar este registro?</h3> 
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$elemento->id_t_infra}}</td>
                            <td>{{$elemento->nombre_t_infra}}</td>
                            <td>{{$elemento->descrip_t_infra}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </p>
        <form action="{{route('desCatInfraestructura',$elemento->id_t_infra)}}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{route('tpInfra')}}" class="btn  btn-info">
            <span class="fas fa-undo-alt"></span> Regresar</a>
            <button type="submit" class="btn btn-danger">
            <span class="fas fa-user-times"></span> Eliminar
            </button>
        </form>
    </div>
</div>
@endsection