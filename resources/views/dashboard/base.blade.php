@extends('base')
@section('body')
    <div class="bg-base-200 flex flex-col">
        @include('dashboard.navbar')
        <div class="flex flex-row">
            <div class="drawer drawer-mobile h-[calc(100vh_-_70px)] md:h-screen">
                <input id="sidebar-drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content flex flex-col items-center justify-between gap-2">
                    <div class="self-start mt-2 w-full">
                        <div class="card px-2 mx-2 bg-base-100">
                            <div class="text-sm breadcrumbs">
                                <ul>
                                    <li>
                                        <a href="{{ URL::to('/') }}">
                                            Inicio
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= count(Request::segments()); $i++)
                                        <li>
                                            <a
                                                href="{{ URL::to(implode('/', array_slice(Request::segments(), 0, $i, true))) }}">
                                                {{ Str::title(Request::segment($i)) }}
                                            </a>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow flex flex-col justify-between px-2 w-full">
                        @yield('view')
                    </div>
                    <footer class="footer footer-center p-4 text-base-content bg-base-200">
                        <div>
                            <p>© Prueba S.A. Todos los derechos reservados</p>
                        </div>
                    </footer>
                </div>
                <div class="drawer-side">
                    <label for="sidebar-drawer" class="drawer-overlay"></label>
                    @include('dashboard.sidebar')
                </div>
            </div>
        </div>
    </div>
    @yield('modal')
    @yield('script')
@endsection
