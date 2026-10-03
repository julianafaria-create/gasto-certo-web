@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">
    Editar Usuário
</h1>

<div class="card shadow">

    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('usuarios.update', $usuario) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nome</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $usuario->name) }}"
                    required>
            </div>

            <div class="form-group">
                <label>E-mail</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $usuario->email) }}"
                    required>
            </div>

            <div class="form-group">
                <label>Tipo</label>

                <select name="tipo" class="form-control">

                    <option
                        value="usuario"
                        @selected(old('tipo', $usuario->tipo) == 'usuario')>
                        Usuário
                    </option>

                    <option
                        value="admin"
                        @selected(old('tipo', $usuario->tipo) == 'admin')>
                        Administrador
                    </option>

                </select>
            </div>

            <button type="submit" class="btn btn-success">
                Atualizar
            </button>

            <a href="{{ route('usuarios.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@endsection