@extends('auth.app')
@section('content')
    <div class="login-page">
        <div class="form">
            <form id="form-login" action="{{ route('login-view') }}" method="POST">
                @csrf
                <input
                    type="text"
                    id="identification"
                    name="identification"
                    placeholder="Su Identificación"
                    autofocus
                />
                <input id="password" type="password" name="password" placeholder="Contraseña" />
                <button id="login-user" type="submit">Iniciar sesión</button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/login.js') }}"></script>
@endpush
