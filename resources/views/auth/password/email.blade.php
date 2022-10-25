@extends('auth.base')

@section('auth-title')
    <h3 class="text-base">Restablecimiento de contraseña</h3>
    <h3 class="text-sm">Le enviaremos un enlace para restablecer su clave</h3>
    @if (session('status'))
        <div class="alert alert-success shadow-lg py-2 my-2">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm"> {{ session('status') }}</span>
            </div>
        </div>
    @endif
@endsection

@section('auth-body')
    <form method="POST" action="{{ route('password.email') }}" accept-charset="UTF-8">
        @csrf

        <div class="form-control">
            <x-float-input class="mb-3" type="email" id="email" name="email" label="Email del proveedor"
                value="{{ old('email') }}" />
        </div>

        <div class="flex flex-col w-full border-opacity-50">
            <button class="btn btn-primary mb-6" type="submit">Enviar enlace</button>
            <a class="btn btn-outline btn-primary btn-sm" href={{ route('login') }}>Volver</a>
        </div>
    </form>
@endsection
