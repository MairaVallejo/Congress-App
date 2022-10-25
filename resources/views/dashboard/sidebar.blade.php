<div class="menu bg-base-100 w-80 justify-between">
    <ul>
        <li class="py-4 hidden md:block border-b-2 border-primary">
            <x-logo />
        </li>
        @role('Super Admin|Admin')
            <li class="menu-title pt-2">
                <span>Administración</span>
            </li>
            @can('Usuarios')
                <li>
                    <a href="{{ route('admin.usuarios.index') }}">
                        <x-icon name="users" class="fill-info" solid />Listado de Usuarios
                    </a>
                </li>
            @endcan

            <li>
                <a>
                    <x-icon name="bell" class="fill-warning" solid />Centro de notificaciones
                </a>
            </li>
        @endrole
        <li class="menu-title pt-2">
            <span>Consulta de proveedores</span>
        </li>
        <li>
            <a>
                <div class="indicator">
                    <x-icon name="bell" class="fill-info" solid /><span
                        class="badge badge-xs badge-primary indicator-item">5</span>
                </div>Notificaciones
            </a>
        </li>
        <li>
            <a>
                <x-icon name="document-chart-bar" class="fill-info" solid />Ordenes de compra
            </a>
        </li>
    </ul>
    <div>
        <ul>
            <li class="border-t-2">
                <h3 class="text-base font-medium">
                    <x-icon name="cog-6-tooth" class="fill-info" solid />Configuración
                </h3>
            </li>
            <li class="border-b-2">
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
