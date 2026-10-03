@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">
    Usuários
</h1>

<a href="{{ route('usuarios.create') }}"
   class="btn btn-success mb-3">

    <i class="fas fa-user-plus"></i>
    Novo Usuário

</a>

@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

@if(session('error'))

    <div class="alert alert-danger">
        {{ session('error') }}
    </div>

@endif

<div class="card shadow">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead class="thead-light">

                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th width="180">Ações</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($usuarios as $usuario)

                    <tr>

                        <td>{{ $usuario->name }}</td>

                        <td>{{ $usuario->email }}</td>

                        <td>
                            {{ $usuario->tipo === 'admin' ? 'Administrador' : 'Usuário' }}
                        </td>

                        <td>

                            <a href="{{ route('usuarios.edit', $usuario) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>
                                Editar

                            </a>

                            @if($usuario->id !== auth()->id())

                                <form
                                    action="{{ route('usuarios.destroy', $usuario) }}"
                                    method="POST"
                                    style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Excluir usuário?')">

                                        <i class="fas fa-trash"></i>
                                        Excluir

                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center">
                            Nenhum usuário encontrado.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection