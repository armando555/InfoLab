@extends('layouts.app')
@section('content')
    <div class="d-flex flex-row bd-highlight mb-3">
        <div class="p-2 bd-highlight"><h1 class="display-1">Informes</h1></div>
        <div class="p-2 bd-highlight"><a href="{{route('report.add')}}" class="btn btn-primary">Crear Informe</a></div>
    </div>
    <div class="d-flex flex-column-reverse bd-highlight">
        <div class="p-2 bd-highlight">
            @forelse($reports as $report)
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center" style="background-color:#A21313; color:white;">{{$report->title}}</h1>
                        <h4>Autor: {{$report->author}}</h4>
                        <h4>Descripción:</h4>
                        <p>{{$report->description}}</p>
                        <div class="form-group">
                            <form class="" action="{{route('report.destroy',$report)}}" method="post">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                            <a href="{{route('report.edit',$report)}}" class="btn btn-primary">Editar</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card">
                    <div class="card-body">
                        <h1>No hay ningún informe</h1>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
@endsection
