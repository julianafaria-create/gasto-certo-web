@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">
    Categorias
</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex justify-content-between align-items-center">

        <h6 class="m-0 font-weight-bold text-success">
            Lista de Categorias
        </h6>

        <a href="{{ route('categorias.create') }}" class="btn btn-success">

            <i class="fas fa-plus"></i>

            Nova Categoria

        </a>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead class="thead-light">

                    <tr>

                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="170">Ações</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categorias as $categoria)

                    <tr>

                        <td>{{ $categoria->id }}</td>

                        <td>{{ $categoria->nome }}</td>

                        <td>{{ $categoria->descricao }}</td>

                        <td>

                            <a href="{{ route('categorias.edit',$categoria) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                                Editar

                            </a>

                            <form
                                action="{{ route('categorias.destroy',$categoria) }}"
                                method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Deseja excluir esta categoria?')">

                                    <i class="fas fa-trash"></i>

                                    Excluir

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4" class="text-center">

                            Nenhuma categoria cadastrada.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection