<div>
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show  text-center" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header m-2">
            <input wire:model.live="search" type="text" class="form-control"
                placeholder="Ingrese el nombre de un posts">
        </div>

        @if ($posts->count())
            <div class="card-body w-100">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->name }}</td>
                                <td width="10px">
                                    <a class="btn btn-success fw-bold"
                                        href="{{ route('admin.posts.edit', $post) }}"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                                <td width="10px">
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger fw-bold"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>

            <div class="container-fluid d-flex justify-content-end ">
                {{ $posts->links() }}
            </div>
        @else
            <div class="card-body">
                <p class="m-0 fw-bold">No se encontraron resultados...</p>
            </div>
        @endif
    </div>
</div>
