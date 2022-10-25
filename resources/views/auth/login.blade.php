@extends('auth.base')

@section('auth-title')
    <h3 class="text-lg">Ingreso de usuarios</h3>
@endsection

@section('auth-body')
    <form method="POST" action="{{ route('login') }}" accept-charset="UTF-8" @disabled($errors->isNotEmpty())>
        @csrf

        <div class="form-control">
            <x-float-input class="mb-3" type="text" id="email" name="email" label="Correo de usuario"
                value="{{ old('email') }}" />
        </div>

        <div class="form-control">
            <x-float-input class="mb-3" type="password" id="password" name="password" label="Contraseña" />
        </div>

        <div class="flex flex-col w-full border-opacity-50">
            <button class="btn btn-primary" type="submit">Ingresar</button>
            <div class="divider"></div>
            @if (Route::has('password.request'))
                <a class="btn btn-outline btn-primary btn-sm" href={{ route('password.email') }}>¿Olvidó su Clave?</a>
                <div class="divider"></div>
            @endif
            <a class="btn btn-secondary btn-sm" href={{ route('register') }}>Registarse</a>
        </div>
    </form>
@endsection
