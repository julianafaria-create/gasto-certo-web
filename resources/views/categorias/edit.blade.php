@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">

Editar Categoria

</h1>

<div class="card shadow">

    <div class="card-body">

        <form
            action="{{ route('categorias.update',$categoria) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Nome</label>

                <input
                    type="text"
                    name="nome"
                    class="form-control"
                    value="{{ $categoria->nome }}"
                    required>

            </div>

            <div class="form-group">

                <label>Descrição</label>

                <textarea
                    name="descricao"
                    class="form-control"
                    rows="3">{{ $categoria->descricao }}</textarea>

            </div>

            <button class="btn btn-success">

                Atualizar

            </button>

            <a href="{{ route('categorias') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@endsection