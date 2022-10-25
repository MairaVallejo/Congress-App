@extends('base')
@section('body')
    <div class="hero min-h-screen bg-base-200 flex flex-col justify-between">
        <div class="hero-content">
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <figure class="px-5 pt-5 flex-row gap-5">
                    @include('auth.logo')
                </figure>
                <div class="card-body gap-5 p-5">
                    <div class="card-title flex-col gap-0 font-bold text-center">
                        <h1 class="text-1xl">Congress-App
                        </h1>
                        @yield('auth-title')
                    </div>
                    @yield('auth-body')
                </div>
            </div>
        </div>
        <footer class="footer footer-center p-4 text-base-content bg-base-200">
            <div>
                <p>© Prueba S.A. Todos los derechos reservados</p>
            </div>
        </footer>
    </div>
@endsection
