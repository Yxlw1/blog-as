@extends('adminlte::page')

@section('title', 'Blog de Análisis de Sistemas')

@section('content_header')
    <h1>Lista de Etiquetas</h1>
@stop

@section('css')
    @vite(['resources/assets/scss/app.scss', 'resources/assets/js/app.js'])
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show  text-center" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        @can('admin.tags.create')
            <div class="card-header">
                <a href="{{ route('admin.tags.create') }}" class="btn btn-dark">Agregar Etiqueta</a>
            </div>
        @endcan

        <div class="card-body w-100">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        @can(['admin.tags.destroy'])
                            <th colspan="2">Acciones</th>
                        @endcan
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">{{ $tag->id }}</th>
                            <td>{{ $tag->name }}</td>

                            @can('admin.tags.edit')
                                <td width="10px">
                                    <a class="btn btn-success fw-bold"
                                        href="{{ route('admin.tags.edit', $tag) }}"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            @endcan

                            @can('admin.tags.destroy')
                                <td width="10px">
                                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger fw-bold"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
