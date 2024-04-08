@extends('layouts.default')
@section('content')
<h1 style="text-align: center;" class="m-5">Bienvenido de nuevo:</h1>
<h4 style="text-align: center;">{{ Auth::user()->name }}</h4>
@endsection