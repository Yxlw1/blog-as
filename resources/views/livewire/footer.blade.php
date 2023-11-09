<footer class="container-fluid bg-dark pt-5 pb-2">
    <div class="container mb-4">
        <div class="row border-bottom border-primary ">
            <div class="col-lg-4 col-sm-6 mb-3 mb-sm-0">
                <h3 class="p-0 fs-4 text-white"><i class="fa-sharp fa-solid fa-diagram-project text-primary"></i><span
                        class="fw-bold">As</span></h3>

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
                            @if (request()->is('/')) href="#" @else href="{{ route('index') }}" @endif>
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
                                <p class="m-0"><i class="fa-brands fa-facebook text-primary"></i> Facebook</p>
                            </a></li>
                        <li class="pt-3"><a
                                class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-opacity-75 link-opacity-100-hover"
                                href="#">
                                <p class="m-0"><i class="fa-brands fa-instagram"></i> Instagram</p>
                            </a></li>
                        <li class="pt-3"><a
                                class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-opacity-75 link-opacity-100-hover"
                                href="#">
                                <p class="m-0"><i class="fa-brands fa-twitter text-primary"></i> Twitter</p>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="text-light text-center">
        <p>&copy; Copyright <i class="fa-sharp fa-solid fa-diagram-project text-primary"></i><span
                class="fw-bold">As</span>. All Rights Reserved</p>
    </div>
</footer>
