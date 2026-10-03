@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">
    Novo Usuário
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

        <form action="{{ route('usuarios.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Nome</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    required>
            </div>

            <div class="form-group">
                <label>E-mail</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    required>
            </div>

            <div class="form-group">
                <label>Senha</label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required>
            </div>

            <div class="form-group">
                <label>Tipo</label>

                <select name="tipo" class="form-control">

                    <option value="usuario">
                        Usuário
                    </option>

                    <option value="admin">
                        Administrador
                    </option>

                </select>
            </div>

            <button type="submit" class="btn btn-success">
                Salvar
            </button>

            <a href="{{ route('usuarios.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@endsection