@php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Auth;
@endphp

<x-app-layout>
    <div class="section-header bg-light mb-4">
        <h3 class="p-3 fw-bold text-center text-uppercase">Últimas Actualizaciones</h3>
    </div>

    <div class="container p-4 pt-0">
        @if (count($posts) > 0)
            <div class="row">
                @foreach ($posts as $post)
                    <article
                        class="@if (count($posts) == 1) col-md-12 @else col-sm-6 col-lg-4 mb-4 @if ($loop->first) col-lg-8 @endif @endif">

                        <div class="card shadow p-3 bg-body rounded border-0">
                            <img loading="lazy" class="card-img-top img-fluid rounded"
                                src="@if (isset($post->image)) {{ storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2016/08/26/12/44/houses-1622066_1280.jpg @endif"
                                alt="imagen-blog">

                            <div class="card-body">
                                <h4 class="fw-bold text-black card-title">{{ $post->name }}</h4>
                                <p class="my-3 text-black card-text">{!! $post->extract !!}</p>

                                <div>
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('post.tag', $tag->slug) }}"
                                            class="btn btn-secondary fw-bold mb-3 rounded-4 p-1">#{{ $tag->name }}</a>
                                    @endforeach
                                </div>

                                <div class="d-flex mt-2">
                                    <div class="me-2">
                                        <p class="fst-italic">{{ $post->user->name }} |</p>
                                    </div>

                                    <div>
                                        <p class="fw-italic">
                                            <i class="fa-regular fa-calendar-days fw-bold"></i>
                                            {{ $post->updated_at->toDateString() }}
                                        </p>
                                    </div>
                                </div>

                                <a href="{{ route('post.show', $post->slug) }}"
                                    class="btn btn-primary text-light rounded-0 text-uppercase fw-bold px-4 py-2 mb-2">Leer
                                    más
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="container-fluid d-flex justify-content-end ">
                {{ $posts->links() }}
            </div>
        @else
            <div class="card" style="height: 400px">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <h4 class="card-title fw-bold">No se encontraron entradas...</h4>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
