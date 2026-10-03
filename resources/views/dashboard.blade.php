@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">
    Dashboard
</h1>

<div class="row">

    <div class="col-md-4">
        <div class="card border-left-success shadow mb-4">
            <div class="card-body">

                <h6 class="text-success font-weight-bold">
                    Valor Total dos Gastos
                </h6>

                <h3>
                    R$ {{ number_format($valorTotal, 2, ',', '.') }}
                </h3>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-left-primary shadow mb-4">
            <div class="card-body">

                <h6 class="text-primary font-weight-bold">
                    Categorias
                </h6>

                <h3>
                    {{ $totalCategorias }}
                </h3>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-left-warning shadow mb-4">
            <div class="card-body">

                <h6 class="text-warning font-weight-bold">
                    Gastos cadastrados
                </h6>

                <h3>
                    {{ $totalGastos }}
                </h3>

            </div>
        </div>
    </div>

</div>

<div class="mb-4">

    <a href="{{ route('gastos.create') }}"
       class="btn btn-success">

        <i class="fas fa-plus"></i>

        Novo Gasto

    </a>

    <a href="{{ route('categorias.create') }}"
       class="btn btn-primary">

        <i class="fas fa-tags"></i>

        Nova Categoria

    </a>

</div>

<div class="card shadow">

    <div class="card-header">

        <h6 class="font-weight-bold text-success mb-0">
            Últimos Gastos
        </h6>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="thead-light">

                <tr>

                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                    <th>Data</th>

                </tr>

            </thead>

            <tbody>

            @forelse($ultimosGastos as $gasto)

                <tr>

                    <td>{{ $gasto->descricao }}</td>

                    <td>{{ $gasto->categoria->nome }}</td>

                    <td>
                        R$ {{ number_format($gasto->valor, 2, ',', '.') }}
                    </td>

                    <td>
                        {{ date('d/m/Y', strtotime($gasto->data)) }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center">

                        Nenhum gasto cadastrado.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection