@extends('layouts.app')
@section('content')
<div class="d-flex flex-row bd-highlight mb-3">
  <div class="p-2 bd-highlight"><h1 class="display-1">FORO</h1></div>
  <div class="p-2 bd-highlight"><a href="{{route('publication.add')}}" class="btn btn-primary">Agregar Publicación</a></div>
</div>
<div class="d-flex flex-column-reverse bd-highlight">
  <div class="p-2 bd-highlight">

    @forelse($publicationes as $publication)
    <div class="card">
      <div class="card-body">
        <h1 class="text-center" style="background-color:#A21313; color:white;">{{$publication->titlePublication}}</h1>
        <h4>Autor: {{$publication->author}}</h4>
        <p>{{$publication->detailsPublication}}</p>
        <img src="{{$publication->imageUrl}}" style="width:400px; height:300px; left: 0 px;" alt="logo">
        <div class="form-group">
          <form class="" action="{{route('publication.destroy',$publication)}}" method="post">
            @csrf @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
          </form>
          <a href="{{route('publication.edit',$publication)}}" class="btn btn-primary">Editar</a>
        </div>
      </div>
    </div>
    @empty
    <div class="card">
      <div class="card-body">
        <h1>No hay ninguna publicación</h1>
      </div>
    </div>
    @endforelse
  </div>

</div>
@endsection
