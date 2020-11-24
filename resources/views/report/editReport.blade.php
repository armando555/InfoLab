@extends('layouts.app')
@section('content')
    <h1>Editando informe</h1>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('report.update',$report)}}" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="form-group">
                    <label for="formGroupExampleInput"><h3>Título del informe</h3></label>
                    <input type="text" name="titleReport"class="form-control" id="formGroupExampleInput" placeholder="Título del informe"  value="{{$report->title}}">
                    {!!$errors->first('titleReport', '<small style="color:black;">:message</small>')!!}
                </div>
                <input type="hidden" name="author" class="form-control" id="formGroupExampleInput2" placeholder="Autor"  value="{{Auth::user()->name}}">
                {!!$errors->first('author', '<small style="color:black;">:message</small>')!!}
                <div class="form-group">
                    <label for="formGroupExampleInput2"><h3>Descripción</h3></label>
                    <input type="text" name="description" class="form-control" id="formGroupExampleInput2" placeholder="Descripción del informe"  value="{{$report->description}}">
                    {!!$errors->first('description', '<small style="color:black;">:message</small>')!!}
                </div>
                <button type="submit" class="btn btn-success">Actualizar datos básicos del informe</button>
            </form>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#numData">
                Agregar conjunto de datos
            </button>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#textData">
                Agregar de analisis de datos
            </button>
            <form method="post" action="{{route('report.modal.add')}}" enctype="multipart/form-data">
                @csrf
                    <!-- Modal -->
                    <div class="modal fade" id="numData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Conjunto de datos</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput"><h3>Ingresa los datos separados por comas</h3></label>
                                        <input type="text" name="dataGroup"class="form-control" id="formGroupExampleInput" placeholder="Ejemplo: 3,2,1,5,6,3.3,3.2,..."  value="{{old('dataGroup')}}">
                                        {!!$errors->first('dataGroup', '<small style="color:black;">:message</small>')!!}
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="hidden" name="idReport"class="form-control" id="formGroupExampleInput" placeholder="Ejemplo: 3,2,1,5,6,3.3,3.2,..."  value="{{$report->id}}">
                                        {!!$errors->first('idReport', '<small style="color:black;">:message</small>')!!}
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput"><h3>Ingresa el númeral del grupo de datos</h3></label>
                                        <input type="number" name="numeralDataGroup"class="form-control" id="formGroupExampleInput" placeholder="Escribe aquí el númeral del grupo"  value="{{old('numeralDataGroup')}}">
                                        {!!$errors->first('numeralDataGroup', '<small style="color:black;">:message</small>')!!}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-primary" value="Guardar datos">
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            <form method="post" action="{{route('report.data.add')}}" enctype="multipart/form-data">
                @csrf
                    <div class="modal fade" id="textData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Análisis de datos</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput"><h3>Ingresa tu análisis</h3></label>
                                            <input type="text" name="analiticData"class="form-control" id="formGroupExampleInput" placeholder="Ejemplo:Según las observaciones ..."  value="{{old('analiticData')}}">
                                            {!!$errors->first('analiticData', '<small style="color:black;">:message</small>')!!}
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="hidden" name="idReport"class="form-control" id="formGroupExampleInput" placeholder="Ejemplo: 3,2,1,5,6,3.3,3.2,..."  value="{{$report->id}}">
                                            {!!$errors->first('idReport', '<small style="color:black;">:message</small>')!!}
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput"><h3>Ingresa el númeral del análisis</h3></label>
                                            <input type="number" name="numeralAnalitic"class="form-control" id="formGroupExampleInput" placeholder="Escribe aquí el númeral del análisis"  value="{{old('numeralAnalitic')}}">
                                            {!!$errors->first('numeralAnalitic', '<small style="color:black;">:message</small>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-primary" value="Guardar análisis">
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            <!--ACA VAN LAS CONSULTAS INDIVIDUALES QUE DEBO BUSCAR MAÑANA-->
            <form method="post" action="{{route('report.operation.select')}}" enctype="multipart/form-data">
                @csrf
                <label for="groupData">Escoja el grupo de datos</label>
                <select name="groupData">
                    @forelse($groupData as $group)
                        <option>{{$group}}</option>
                    @empty
                        No hay grupos
                    @endforelse
                </select>
                <label for="calculus">Escoja el cálculo a realizar</label>
                <select name="calculus">
                    <option>Promedio</option>
                    <option>Moda</option>
                    <option>Mediana</option>
                </select>
                <input type="submit" class="btn btn-primary" value="Realizar cálculo">
            </form>
            
            <div class="card">
                <div class="card-body">
                    @forelse($textData as $text)
                        <div class="card">
                            <div class="card-body">
                                <p><b>Identificador de análisis:</b>{{$text->numeralData}}, <br>      <b>Análisis:</b> {{$text->analysisText}} </p>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-body">
                                <h1>No hay ningún análisis</h1>
                            </div>
                        </div>
                    @endforelse

                    @forelse($numDatas as $numData)
                        <div class="card">
                            <div class="card-body">
                                <p><b>Grupo al que pertenece este dato:</b>{{$numData->numeralData}},<br>     <b>dato:</b> {{$numData->numData}}</p>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-body">
                                <h1>No hay ningún conjunto de datos</h1>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

