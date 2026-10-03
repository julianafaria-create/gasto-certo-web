@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">

Cadastrar Categoria

</h1>

<div class="card shadow">

    <div class="card-body">

        <form action="{{ route('categorias.store') }}" method="POST">

            @csrf

            <div class="form-group">

                <label>Nome</label>

                <input
                    type="text"
                    name="nome"
                    class="form-control"
                    required>

            </div>

            <div class="form-group">

                <label>Descrição</label>

                <textarea
                    name="descricao"
                    class="form-control"
                    rows="3"></textarea>

            </div>

            <button class="btn btn-success">

                Salvar

            </button>

            <a href="{{ route('categorias') }}"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@endsection