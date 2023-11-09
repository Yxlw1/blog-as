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
                placeholder="Ingrese el nombre de un usuario">
        </div>

        @if ($users->count())
            <div class="card-body w-100">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="10px">
                                    <a class="btn btn-success fw-bold"
                                        href="{{ route('admin.users.edit', $user) }}"><i class="fas fa-user-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>

            <div class="container-fluid d-flex justify-content-end ">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <p class="m-0 fw-bold">No se encontraron registros...</p>
            </div>
        @endif
    </div>
</div>
