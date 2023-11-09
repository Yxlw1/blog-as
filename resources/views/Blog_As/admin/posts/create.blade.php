@extends('adminlte::page')

@section('title', 'Blog de Análisis de Sistemas')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('css')
    @vite(['resources/assets/scss/app.scss', 'resources/assets/js/app.js'])
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

            {{-- {!! Form::hidden('user_id', auth()->user()->id) !!} --}}

            @include('Blog_As.admin.posts.partials.form')

            {!! Form::submit('Crear post', ['class' => 'btn btn-primary']) !!}
           
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create(document.querySelector('#extract'))
        .catch(error => {
            console.error(error);
        });

        ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
                console.error(error);
        });

        //Cambiar Imagen
        document.getElementById("file").addEventListener('change' , cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@stop
