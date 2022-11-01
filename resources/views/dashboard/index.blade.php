@extends('dashboard.base')

@section('view')
    <div class="card card-side bg-base-100 shadow-xl w-80 md:w-96">
        <div class="card-body gap-6">
            <h2 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>Datos del usuario</h2>
            <ul>
                <li class="bordered">
                    <div class="text-base flex flex-col w-full gap-0 pb-1">
                        <span class="text-sm font-bold w-full rounded-none flex flex-row gap-1">EMAIL</span>
                        <span
                            class="badge badge-primary badge-outline badge-md font-semibold w-full rounded-none">{{ Auth()->user()->email }}</span>
                    </div>

                    <div class="bordered">
                        <h3 class="text-base flex flex-col w-full gap-0 py-1">
                            <span class="text-sm font-bold w-full rounded-none flex flex-row gap-1">Nombre</span>
                            <span
                                class="badge badge-primary badge-outline badge-md font-semibold w-full rounded-none">{{ Auth()->user()->name }}</span>
                        </h3>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
