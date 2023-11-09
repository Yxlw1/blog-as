@extends('adminlte::page')

@section('title', 'Blog de Análisis de Sistemas')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    @vite(['resources/assets/scss/app.scss', 'resources/assets/js/app.js'])
@stop