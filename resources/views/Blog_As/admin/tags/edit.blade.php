@extends('adminlte::page')

@section('title', 'Blog de Análisis de Sistemas')

@section('content_header')
    <h1>Editar Etiqueta</h1>
@stop

@section('css')
    @vite(['resources/assets/scss/app.scss'])
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show  text-center" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}

            @include('Blog_As.admin.tags.partials.form')

            {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop
