@extends('adminlte::page')

@section('title', 'CursosDev')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')
    @if(session()->has('success'))      
        <div class="alert alert-primary" role="alert">
            <strong>¡Éxito! </strong> {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.roles.create') }}">Nuevo role</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a class="btn btn-secondary" href="{{route('admin.roles.edit', $role)}}"> {{__('Edit')}}</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ningun role registrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop