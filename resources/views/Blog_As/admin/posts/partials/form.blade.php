<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el slug del post',
        'readonly',
    ]) !!}

    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoría') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-select']) !!}

    @error('category_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <h4>Etiquetas</h4>

    @foreach ($tags as $tag)
        <label class="me-3">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{ $tag->name }}
        </label>
    @endforeach

    @error('tags')
        <br>
        <span class="text-danger mt-5">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <h4>Estado</h4>

    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>

    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>

    @error('status')
        <br>
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<diw class="row">
    <div class="col-5 mb-3">
        @if (isset($post->image))
            <img id="picture" class="img-fluid" src="{{ Storage::url($post->image->url) }}" alt="imagen-blog">
        @else
            <img id="picture" class="img-fluid"
                src="https://cdn.pixabay.com/photo/2016/08/26/12/44/houses-1622066_1280.jpg" alt="imagen-blog">
        @endif

    </div>

    <div class="col-7">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrará en el post') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod aut, ducimus dolorum asperiores numquam
            debitis minima sunt porro amet. Facilis dignissimos eius quasi dicta! Ratione quasi voluptate
            consequuntur itaque eveniet! Lorem, ipsum dolor sit amet consectetur adipisicing elit. In ipsa
            voluptates repudiandae necessitatibus, placeat quidem saepe similique provident exercitationem, a ex
            est minus, autem commodi veritatis deleniti illo iste delectus.</p>
    </div>
</diw>

<div class="form-group">
    {!! Form::label('extract', 'Extracto:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

    @error('extract')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    @error('body')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
