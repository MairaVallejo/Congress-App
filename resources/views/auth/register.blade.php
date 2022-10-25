@extends('auth.base')

@section('auth-title')
    <h3 class="text-lg">Registro de usuarios</h3>
@endsection

@section('auth-body')
    <form method="POST" action="{{ route('register') }}" accept-charset="UTF-8" @disabled($errors->isNotEmpty())>
        @csrf

        <div class="form-control">
            <x-float-input class="mb-3" type="text" id="email" name="email" label="Correo del usuario"
                value="{{ old('email') }}" />
        </div>

        <div class="form-control">
            <x-float-input class="mb-3" type="password" id="password" name="password" label="Contraseña" />
            <x-float-input class="mb-3" type="password" id="password_confirmation" name="password_confirmation"
                label="Confirmar contraseña" />
        </div>

        <div class="flex flex-col w-full border-opacity-50">
            <button class="btn btn-secondary" type="submit">Registarse</button>
            <div class="divider"></div>
            <a class="btn btn-primary btn-sm" href="{{ route('login') }}">Ingresar</a>
        </div>
    </form>
@endsection
