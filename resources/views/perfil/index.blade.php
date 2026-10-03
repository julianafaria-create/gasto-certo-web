@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">
Meu Perfil
</h1>

<div class="card shadow">

    <div class="card-body">

        <p>

            <strong>Nome:</strong>

            {{ $usuario->name }}

        </p>

        <p>

            <strong>Email:</strong>

            {{ $usuario->email }}

        </p>

        <p>

            <strong>Tipo:</strong>

            {{ ucfirst($usuario->tipo) }}

        </p>

        <a href="{{ route('perfil.edit') }}"
           class="btn btn-success">

            Editar Perfil

        </a>

    </div>

</div>

@endsection