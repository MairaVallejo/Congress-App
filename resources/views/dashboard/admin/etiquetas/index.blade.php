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
                    <x-icon name="list-bullet" class="mr-2" solid mini /><span class="text-base font-semibold">Listado de
                        Etiquetas</span>
                </div>
                <a class="btn btn-outline btn-primary md:btn-sm md:h-full py-0" href="{{ route('admin.etiquetas.create') }}">
                    <x-icon name="user-plus" class="mr-2" solid mini />Agregar etiqueta
                </a>
            </div>
            <div class="divider my-0"></div>
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <td><label>ID</label></td>
                            <th><label>Descripcion</label></th>
                            <th><label class="float-right">Acciones</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                            <tr data-id="{{ $item->id }}">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td>
                                    <div class="btn-group float-right">
                                        <a class="btn btn-outline btn-info"
                                            href="{{ route('admin.etiquetas.edit', $item) }}">
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
                                            <span>¡La lista de etiquetas está vacía!</span>
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
                <h3 class="text-lg font-bold">¿Seguro de eliminar al Etiqueta?</h3>
                <p class="py-4">Una vez hecho, no se puede deshacer...</p>
                <form action="etiquetas/{id}" method="post">
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
