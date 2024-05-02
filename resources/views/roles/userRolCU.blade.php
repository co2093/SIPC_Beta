@extends('layouts.default')

@section('content')

                
                    <!-- Aquí colocarías tu formulario -->
                    <form class="form-group" method="POST" action="/userRolAsig">
                        @csrf
                    	<div class="form-group">
                            <label for="idUser">ID</label>
                            <input type="text" class="form-control"  name="id" value="{{$usuario->id}}">
                        </div>

                    	 <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" value="{{$usuario->name}}">
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="text" class="form-control" value="{{$usuario->email}}">
                        </div>

                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select name="rol" class="form-control">
                            	<option>Selecciona un Rol</option>
                            	 @foreach($roles as $roles)
                            		<option value="{{$roles->id}}">{{$roles->name}}</option>
                            	@endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                
               
@endsection
