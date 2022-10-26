@extends('dashboard.base')

@section('view')
    <div class="card w-full bg-base-100 shadow-xl">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body px-2 py-4 md:p-5">
            <div class="flex flex-col md:flex-row gap-4 justify-between">
                <div class="badge badge-primary self-center md:self-start py-5 w-full md:w-auto">
                    <x-icon name="users" class="mr-2" solid mini /><span class="text-base font-semibold">Listado de
                        Usuarios</span>
                </div>
                <a class="btn btn-outline btn-primary md:btn-sm md:h-full py-0" href="{{ route('admin.usuarios.create') }}">
                    <x-icon name="user-plus" class="mr-2" solid mini />Agregar usuario
                </a>
            </div>
            <div class="divider my-0"></div>
            <form method="GET" action="{{ route('admin.usuarios.index') }}" accept-charset="UTF-8">
                <div class="flex flex-col justify-between md:flex-row">
                    <div class="flex flex-col md:flex-row md:gap-3">
                        <x-float-input type="text" id="email" name="email" label="Filtrar por Email"
                            value="{{ request()->get('email') }}" />
                        <x-float-select id="condicion" name="condicion" label="Filtrar por Condicion" :values="$filterOptions['condicion']['options']"
                            :selected="$filterOptions['condicion']['selected']" value="{{ request()->get('condicion') }}" />
                    </div>
                    <div>
                        <button class="btn btn-secondary" type="submit">
                            <x-icon name="magnifying-glass" class="mr-2" solid mini />Buscar
                        </button>
                    </div>
                </div>
            </form>
            <div class="divider my-0"></div>
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <td><label>ID</label></td>
                            <th><label>Nombre</label></th>
                            <th><label>E-Mail</label></th>
                            <th><label>Condición</label></th>
                            <th><label class="float-right">Acciones</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                            <tr data-id="{{ $item->id }}">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="flex flex-col gap-1">
                                        @if (count($item->roles) > 0)
                                            <span class="badge badge-accent">Administrador</span>
                                        @else
                                            <span class="badge badge-ghost">Usuario</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group float-right">
                                        <a class="btn btn-outline btn-info"
                                            href="{{ route('admin.usuarios.edit', $item) }}">
                                            <x-icon name="pencil-square" class="mr-2" solid mini /> Editar
                                        </a>
                                        <button data-type="delete" class="modal-button btn btn-error btn-outline">
                                            <x-icon name="trash" class="mr-2" solid mini />Remover
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-ghost shadow-lg">
                                        <div>
                                            <x-icon name="exclamation-circle" class="mr-2" />
                                            <span>¡La lista de usuarios está vacía!</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $data->links() }}
        </div>
    </div>
@endsection

@section('modal')
    <div id="modal-container"></div>
    <template id="template-modal-delete">
        <input type="checkbox" id="modal-delete-{id}" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box relative">
                <label for="modal-delete-{id}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="text-lg font-bold">¿Seguro de eliminar al Usuario?</h3>
                <p class="py-4">Una vez hecho, no se puede deshacer...</p>
                <form action="usuarios/{id}" method="post">
                    @csrf
                    @method('delete')
                    <button class="modal-button btn btn-error btn-outline" type="submit">
                        <x-icon name="trash" class="mr-2" solid mini />Remover
                    </button>
                </form>
            </div>
        </div>
    </template>
@endsection

@section('script')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            window.useModal();
        });
    </script>
@endsection
