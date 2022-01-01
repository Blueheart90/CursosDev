@extends('adminlte::page')

@section('title', 'CursosDev')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.prices.create') }}">Nuevo Precio</a>
    <h1>Lista de Precios</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-primary">
            {{ session('info') }}
        </div>

    @endif
    <div class="card">
        <table class=" table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prices as $price)
                    <tr>
                        <td>
                            {{ $price->id }}
                        </td>
                        <td>
                            {{ $price->name }}
                        </td>
                        <td>
                            {{ $price->value }}
                        </td>
                        <td width='10px'>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.prices.edit', $price) }}">Editar</a>
                        </td>
                        <td width='10px'>
                            <form action="{{ route('admin.prices.destroy', $price) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

