@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">
    Gastos
</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h6 class="font-weight-bold text-success mb-0">
            Lista de Gastos
        </h6>

        <a href="{{ route('gastos.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i>
            Novo Gasto
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th width="180">Ações</th>

                </tr>

            </thead>

            <tbody>

            @forelse($gastos as $gasto)

                <tr>

                    <td>{{ $gasto->id }}</td>

                    <td>{{ $gasto->descricao }}</td>

                    <td>{{ $gasto->categoria->nome }}</td>

                    <td>R$ {{ number_format($gasto->valor,2,',','.') }}</td>

                    <td>{{ date('d/m/Y',strtotime($gasto->data)) }}</td>

                    <td>

                        <a href="{{ route('gastos.edit',$gasto) }}"
                           class="btn btn-warning btn-sm">

                            Editar

                        </a>

                        <form
                            action="{{ route('gastos.destroy',$gasto) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Deseja excluir?')">

                                Excluir

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Nenhum gasto cadastrado.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection