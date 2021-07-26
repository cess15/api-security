@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <form id="form-logout" action="{{ route('logout-view') }}" method="POST">
                @csrf
                <button type="submit" id="button-logout" class="btn btn-danger float-right"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
            <i class="fa fa-search"></i>
        </div>
        <div class="col-md-3">
            <input type="search" name="search" id="search" class="form-control" placeholder="Ingrese para buscar...">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody id="tbody-teams"></tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/teams.js') }}" type="module"></script>
@endpush
