<nav class=" navbar navbar-expand-md navbar-dark bg-primary p-3">
    <div class="container p-0">
        <a class="navbar-brand text-light" href="/">
            <h1 class="my-0 mx-3 p-0 fs-2 fw-bold "><i class="fa-sharp fa-solid fa-diagram-project"></i>As</h1>
        </a>

        <button class="navbar-toggler justify-content-end border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span>
                <i class="fa-solid fa-angles-down fs-1 text-light"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end me-4" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <div class="px-3 nav-link">
                        <a class="fw-bold link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            @if (request()->is('/')) href="#" @else href="{{ route('index') }}" @endif>
                            Inicio
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold fw-bold link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu rounded-0" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('post.category', $category->slug) }}">{{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item">
                    <div class="px-3 nav-link">
                        <a class="fw-bold link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="#">
                            Contacto
                        </a>
                    </div>
                </li>

                @auth
                    <li class="nav-item">
                        <div class="nav-link py-1">
                            <div class="dropdown text-end">
                                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle"
                                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ auth()->user()->profile_photo_url }}" alt="mdo" width="32"
                                        height="32" class="rounded-circle">
                                </a>
                                <ul class="dropdown-menu rounded-0 text-small" aria-labelledby="dropdownUser1">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.show') }}">Tu Perfil</a>
                                    </li>

                                    <li>
                                        @can('admin.home')
                                            <a class="dropdown-item" href="{{ route('admin.home') }}">Dashboard</a>
                                        @endcan
                                    </li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                @click.prevent="$root.submit();">
                                                Cerrar Sesión
                                            </a>
                                        </li>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <div class="px-3 p-md-0 nav-link">
                            <a class="btn btn-outline-light me-md-2 fw-bold" href="{{ route('login') }}">Iniciar Sesión</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="px-3 p-md-0 nav-link">
                            <a class="btn btn-secondary fw-bold" href="{{ route('register') }}">Regístrate</a>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
