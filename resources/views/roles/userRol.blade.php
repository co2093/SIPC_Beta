@extends('layouts.default')

@section('content')

    
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($usuario as $usuario)
                <tr>

                    <form action="/userRolCU" method="GET">
                    <input type="hidden" name="id" value="{{$usuario->id}}">     
                    <td>{{$usuario->name_user}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->name_rol}}</td>
                    <td>
                    	<button type="submit" class="btn btn-warning">
			            <i class="fas fa-pencil-alt abrirModal"></i>Editar
				        </button>
                        
				    </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection
