@extends('layouts.app')
@section('content')
    <h1>Creando informe</h1>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('report.add')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput"><h3>Título del informe</h3></label>
                    <input type="text" name="titleReport"class="form-control" id="formGroupExampleInput" placeholder="Título del informe"  value="{{old('titleReport')}}">
                    {!!$errors->first('titleReport', '<small style="color:black;">:message</small>')!!}
                </div>
                <input type="hidden" name="author" class="form-control" id="formGroupExampleInput2" placeholder="Autor"  value="{{Auth::user()->name}}">
                {!!$errors->first('author', '<small style="color:black;">:message</small>')!!}
                <div class="form-group">
                    <label for="formGroupExampleInput2"><h3>Descripción</h3></label>
                    <input type="text" name="description" class="form-control" id="formGroupExampleInput2" placeholder="Descripción del informe"  value="{{old('description')}}">
                    {!!$errors->first('description', '<small style="color:black;">:message</small>')!!}
                </div>
                <button type="submit" class="btn btn-success">Agregar informe</button>
            </form>

        </div>
    </div>
@endsection
