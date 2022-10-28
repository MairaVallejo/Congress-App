@extends('dashboard.base')

@section('view')
    <div class="card w-full bg-base-100 shadow-xl">
        <div class="card-body px-2 py-4 md:p-5 gap-6">
            <div class="flex flex-col md:flex-row gap-4 justify-between">
                <div class="badge badge-primary self-center md:self-start py-5 w-full md:w-auto">
                    <x-icon name="users" class="mr-2" solid mini /><span class="text-base font-semibold">Editar
                        Usuario</span>
                </div>
                <a class="btn btn-outline btn-primary md:btn-sm md:h-full py-0" href="{{ route('admin.usuarios.index') }}">
                    <x-icon name="arrow-uturn-left" class="mr-2" solid mini />Volver
                </a>
            </div>
            <div class="overflow-x-auto w-full">
                <div>
                    <div class="flex flex-col gap-6">
                        <form method="POST" action="{{ route('admin.usuarios.update', $data) }}" accept-charset="UTF-8">
                            {{ method_field('PUT') }}
                            @csrf

                            <div class="form-control mb-3">
                                <x-float-input type="email" id="email" name="email" label="Email"
                                    value="{{ $data->email }}" />
                            </div>
                            <div class="form-control mb-3">
                                <x-float-input type="text" id="name" name="name" label="Nombre del usuario"
                                    value="{{ $data->name }}" />
                            </div>
                            <div class="form-control mb-3">
                                <x-float-select id="role" name="role" label="Rol del usuario" :values="$filterOptions['condicion']['options']"
                                    :selected="$filterOptions['condicion']['selected']" />
                            </div>
                            <div class="form-control mb-3">
                                <x-float-input type="password" id="password" name="password" label="Clave del usuario" />
                            </div>

                            <div class="flex flex-col w-full border-opacity-50">
                                <button class="btn btn-info" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                <h3 class="text-lg font-bold">Congratulations random Internet user!</h3>
                <p class="py-4">You've been selected for a chance to get one year of subscription to use Wikipedia for
                    free!
                </p>
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
