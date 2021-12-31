@extends('adminlte::page')

@section('title', 'CursosDev')

@section('content_header')
    <h1>Editar nivel</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-primary">
            {{ session('info') }}
        </div>
        
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($level, ['route' => ['admin.levels.update', $level], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nivel']) !!}
                    @error('name')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </div>
                {!! Form::submit('Actualizar nivel', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
