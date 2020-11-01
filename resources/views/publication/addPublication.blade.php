@extends('layouts.app')
@section('content')
<h1>Añadir publicación</h1>
<div class="card">
  <div class="card-body">
    <form method="post" action="{{route('publication.add')}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="formGroupExampleInput"><h3>Título de la publicación</h3></label>
        <input type="text" name="titlePublication"class="form-control" id="formGroupExampleInput" placeholder="Título de la publicación"  value="{{old('titlePublication')}}">
        {!!$errors->first('titlePublication', '<small style="color:black;">:message</small>')!!}
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2"><h3>Autor</h3></label>
        <input type="text" name="author" class="form-control" id="formGroupExampleInput2" placeholder="Autor"  value="{{old('author')}}">
        {!!$errors->first('author', '<small style="color:black;">:message</small>')!!}
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2"><h3>Descripción</h3></label>
        <input type="text" name="detailsPublication" class="form-control" id="formGroupExampleInput2" placeholder="Descripción de la publicación"  value="{{old('detailsPublication')}}">
          {!!$errors->first('detailsPublication', '<small style="color:black;">:message</small>')!!}
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2"><h3>Imagen o Articulo</h3></label>
        <input type="file" name="imageUrl" class="form-control" accept="image/*">
        {!!$errors->first('imageUrl', '<small style="color:black;">:message</small>')!!}
      </div>
      <button type="submit" class="btn btn-success">Agregar Publicación</button>
    </form>
  </div>
</div>
@endsection
