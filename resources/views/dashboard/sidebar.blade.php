<div class="menu bg-base-100 w-80 justify-between">
    <ul>
        <li class="py-4 hidden md:block border-b-2 border-primary">
            <x-logo />
        </li>
        @role('Super Admin|Admin')
            <li class="menu-title pt-2">
                <span>Administración</span>
            </li>
            <li>
                <a href="{{ route('admin.usuarios.index') }}">
                    <x-icon name="users" class="fill-info" solid />Listado de Usuarios
                </a>
            </li>
        @endrole
    </ul>
    <div>
        <ul>
            <li class="border-t-2">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <h3 class="text-base font-medium flex flex-row gap-3">
                        <x-icon name="arrow-right-on-rectangle" class="fill-error" solid />Cerrar Sesión
                    </h3>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
    </div>
</div>
