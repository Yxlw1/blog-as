@extends('adminlte::page')

@section('title', 'Blog de Análisis de Sistemas')

@section('content_header')
    <h1>Asignar un rol</h1>
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
            <p class="fs-4">Nombre:</p>
            <p class="form-control">{{ $user->name }}</p>

            <h4>Listado de Roles</h4>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'ms-1']) !!}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach

            {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    @vite(['resources/assets/scss/app.scss', 'resources/assets/js/app.js'])
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
