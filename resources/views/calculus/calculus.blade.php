@extends('layouts.app')
@section('content')
    <h1>El resultado de la operación es:</h1>
    <h2>{{$result}}</h2>
    <a class="btn btn-primary" href="{{route("report.show")}}">Volver</a>
    <a class="btn btn-success" href="#">Guardar Dato</a>
@endsection
