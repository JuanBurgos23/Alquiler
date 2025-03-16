@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Sistema Bloqueado</h2>
    <p>Ingresa tu contraseña para continuar</p>

    <form action="{{ route('unlock') }}" method="POST">
        @csrf
        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        <button type="submit" class="btn btn-primary mt-2">Desbloquear</button>
    </form>
</div>
@endsection
