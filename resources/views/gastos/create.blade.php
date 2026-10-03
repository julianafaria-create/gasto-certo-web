@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">
    Cadastrar Gasto
</h1>

<div class="card shadow">

    <div class="card-body">

        <form action="{{ route('gastos.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Descrição</label>

                <input
                    type="text"
                    name="descricao"
                    class="form-control"
                    required>
            </div>

            <div class="form-group">
                <label>Categoria</label>

                <select
                    name="categoria_id"
                    class="form-control"
                    required>

                    <option value="">Selecione</option>

                    @foreach($categorias as $categoria)

                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nome }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Valor</label>

                <input
                    type="number"
                    step="0.01"
                    name="valor"
                    class="form-control"
                    required>
            </div>

            <div class="form-group">
                <label>Data</label>

                <input
                    type="date"
                    name="data"
                    class="form-control"
                    required>
            </div>

            <button class="btn btn-success">
                Salvar
            </button>

            <a href="{{ route('gastos') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@endsection