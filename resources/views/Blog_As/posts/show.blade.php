@php
    use Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <div class="container shadow p-5 mt-3 mb-5 bg-body rounded-bottom">
        <h2 class="mb-4 fw-bold">{{ $post->name }}</h2>
        <div class="mb-4">
            <p>{!! $post->extract !!}</p>
        </div>

        <div class="row">
            <!-- Contenido Principal -->
            <div class="col-md-8">
                <img loading="lazy" class="img-fluid"
                    src="@if (isset($post->image)) {{ storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2016/08/26/12/44/houses-1622066_1280.jpg @endif"
                    alt="imagen-blog">

                <div class="mt-4">
                    {!! $post->body !!}
                </div>
            </div>

            <!-- Contenido Relacionado -->
            @if (count($similares) > 0)
                <aside class="col-md-4">
                    <h3 class="mb-3 fw-bold">Maś en {{ $post->category->name }}</h3>

                    <ul style="list-style: none" class="p-0">
                        @foreach ($similares as $similar)
                            <li class="mb-4">
                                <a href="{{ route('post.show', $similar->slug) }}"
                                    class="text-decoration-none text-dark fw-bold">
                                    <picture class="">
                                        <source
                                            srcset="@if (isset($similar->image)) {{ storage::url($similar->image->url) }} @else https://cdn.pixabay.com/photo/2016/08/26/12/44/houses-1622066_1280.jpg @endif">
                                        <img loading="lazy" class="img-fluid"
                                            src="@if (isset($similar->image)) {{ storage::url($similar->image->url) }} @else https://cdn.pixabay.com/photo/2016/08/26/12/44/houses-1622066_1280.jpg @endif"
                                            alt="imagen-blog">
                                    </picture>

                                    <div>
                                        {{ $similar->name }}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            @endif
        </div>
    </div>
</x-app-layout>
