@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">
    Editar Perfil
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

        <form action="{{ route('perfil.update') }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nome</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $usuario->name) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label>E-mail</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $usuario->email) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label>Nova senha</label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Deixe vazio para manter a senha atual"
                >
            </div>

            <div class="form-group">
                <label>Confirmar nova senha</label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Digite a nova senha novamente"
                >
            </div>

            <button type="submit" class="btn btn-success">
                Salvar alterações
            </button>

            <a href="{{ route('perfil') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@endsection