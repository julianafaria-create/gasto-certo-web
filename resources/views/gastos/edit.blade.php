@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">
    Editar Gasto
</h1>

<div class="card shadow">

    <div class="card-body">

        <form action="{{ route('gastos.update',$gasto) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Descrição</label>

                <input
                    type="text"
                    name="descricao"
                    class="form-control"
                    value="{{ $gasto->descricao }}"
                    required>
            </div>

            <div class="form-group">
                <label>Categoria</label>

                <select
                    name="categoria_id"
                    class="form-control"
                    required>

                    @foreach($categorias as $categoria)

                        <option
                            value="{{ $categoria->id }}"
                            @if($categoria->id == $gasto->categoria_id)
                                selected
                            @endif>

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
                    value="{{ $gasto->valor }}"
                    required>
            </div>

            <div class="form-group">
                <label>Data</label>

                <input
                    type="date"
                    name="data"
                    class="form-control"
                    value="{{ $gasto->data }}"
                    required>
            </div>

            <button class="btn btn-success">
                Atualizar
            </button>

            <a href="{{ route('gastos') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@endsection