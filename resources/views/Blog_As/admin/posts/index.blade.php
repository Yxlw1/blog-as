@extends('adminlte::page')

@section('title', 'Blog de Análisis de Sistemas')

@section('content_header')
    <a href="{{route('admin.posts.create')}}" class="btn btn-dark float-right me-3 fw-bold">Nuevo Post</a>

    <h1>Lista de Posts</h1>
@stop

@section('css')
    @vite(['resources/assets/scss/app.scss', 'resources/assets/js/app.js'])
@stop

@section('content')

    @livewire('admin.posts-index')

@stop
