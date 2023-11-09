<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog de Análisis y Sistemas</title>
    @vite(['resources/assets/scss/app.scss', 'resources/assets/js/app.js'])

    <!-- Favicons -->
    <link class="text-light" href="{{ Vite::asset('resources/assets/img/icon/diagram-2-fill.svg') }}" rel="icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>

    </style>
</head>

<body>
    <header class="header">
        <div class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                        <input type="search" class="form-control form-control-dark" placeholder="Search..."
                            aria-label="Search">
                    </form>

                    <div class="text-end">
                        <button type="button" class="btn btn-outline-light me-2">Login</button>
                        <button type="button" class="btn btn-warning">Sign-up</button>
                    </div>

                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                          <li><a class="dropdown-item" href="#">New project...</a></li>
                          <li><a class="dropdown-item" href="#">Settings</a></li>
                          <li><a class="dropdown-item" href="#">Profile</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                      </div>



                </div>
            </div>
        </div>

        <div class="position-relative d-item">
            <picture>
                <source srcset="{{ Vite::asset('resources/assets/img/banner.webp') }}">
                <img loading="lazy" src="{{ Vite::asset('resources/assets/img/banner.jpg') }}"
                    class="img-fluid d-img w-100" alt="Imagen Analisis de Sistemas">
            </picture>

            <div class="text-center position-absolute top-50 start-50 translate-middle text-white w-100 h-100">

                <div class="row h-100 w-100 m-0">
                    <div class="pt-5 p-0 w-100">
                        <nav class="navbar navbar-expand-md navbar-danger bg-transparent p-0">
                            <div class="container p-0">
                                <a class="navbar-brand text-light" href="/">
                                    <h1 class="my-0 mx-3 p-0 fs-2"><i
                                            class="fa-sharp fa-solid fa-diagram-project"></i>Análisis<span
                                            class="fw-bold">DeSistemas</span></h1>
                                </a>

                                <button class="navbar-toggler justify-content-end border-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span>
                                        <i class="fa-solid fa-angles-down fs-1 text-light"></i>
                                    </span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-end me-4" id="navbarNav">
                                    <ul class="navbar-nav text-center">
                                        <li class="nav-item">
                                            <div class="px-3 nav-link">
                                                <a class="fw-bold link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                                    href="">
                                                    Inicio
                                                </a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle fw-bold fw-bold link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                                href="#" id="navbarDropdownMenuLink" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Categorias
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                @foreach ($categories as $category)
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('post.category', $category->id) }}">{{ $category->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <div class="px-3 nav-link">
                                                <a class="fw-bold fw-bold link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                                    href="#">
                                                    Sobre mi
                                                </a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="px-3 nav-link">
                                                <a class="fw-bold link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                                    href="#">
                                                    Contacto
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>

                    <div class="p-0">
                        <h2 class="m-0 fw-bold">Blog de Análisis de Sistemas</h2>
                        <p class="m-0">Diseñando un futuro más eficiente, el análisis de sistemas como
                            herramienta
                            esencial</p>
                        <a href=""
                            class="fw-bold mt-3 btn btn-outline-primary text-light rounded-0 px-4 pt-2 border-3">Entradas...</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="container-fluid bg-dark pt-5 pb-2">
        <div class="container mb-4">
            <div class="row border-bottom border-secondary border-opacity-50">
                <div class="col-lg-4 col-sm-6 mb-3 mb-sm-0">
                    <h3 class="p-0 fs-4 text-white"><i class="fa-sharp fa-solid fa-diagram-project"></i>Análisis<span
                            class="fw-bold">DeSistemas</span></h3>

                    <p class="fw-bold text-light fs-6 m-0">Telefono:<span class="fw-normal"> +58 414-4358958</span>
                    </p>
                    <p class="fw-bold text-light fs-6">Email:<span class="fw-normal"> yolwilinares@gmail.com</span>
                    </p>
                </div>

                <div class="col-lg-4 col-sm-6 mb-3">
                    <h4 class="text-light fs-6 fw-bold m-0 mb-sm-2">Explorar</h4>

                    <ul class="footer-link p-0 fs-6 list-unstyled">
                        <li class="pt-3"><a
                                class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-opacity-75 link-opacity-100-hover"
                                href="#">
                                Inicio
                            </a></li>
                        <li class="pt-3"><a
                                class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-opacity-75 link-opacity-100-hover"
                                href="#">
                                Sobre mi
                            </a></li>
                        <li class="pt-3"><a
                                class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-opacity-75 link-opacity-100-hover"
                                href="#">
                                Contacto
                            </a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-sm-6 col-sm mb-3">
                    <div>
                        <h4 class="text-light fs-6 fw-bold m-0 mb-sm-2">Síguenos</h4>

                        <ul class="footer-link p-0 fs-6 list-unstyled">
                            <li class="pt-3"><a
                                    class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-opacity-75 link-opacity-100-hover"
                                    href="#">
                                    <p class="m-0"><i class="fa-brands fa-facebook"></i> Facebook</p>
                                </a></li>
                            <li class="pt-3"><a
                                    class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-opacity-75 link-opacity-100-hover"
                                    href="#">
                                    <p class="m-0"><i class="fa-brands fa-instagram"></i> Instagram</p>
                                </a></li>
                            <li class="pt-3"><a
                                    class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-opacity-75 link-opacity-100-hover"
                                    href="#">
                                    <p class="m-0"><i class="fa-brands fa-twitter"></i> Twitter</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-light text-center">
            <p>&copy; Copyright <i class="fa-sharp fa-solid fa-diagram-project"></i>Análisis<span
                    class="fw-bold">DeSistemas</span>. All Rights Reserved</p>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/47c18e4cf3.js" crossorigin="anonymous"></script>
</body>
</html>
