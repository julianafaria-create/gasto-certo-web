@extends('layouts.app')

@section('conteudo')

<h1 class="h3 mb-4 text-gray-800">
    Painel Administrativo
</h1>

<div class="row">

    <div class="col-md-6 mb-4">

        <div class="card border-left-primary shadow">

            <div class="card-body">

                <h5>Usuários</h5>

                <h2>{{ $totalUsuarios }}</h2>

                <p>Usuários cadastrados no sistema.</p>

                <a href="{{ route('usuarios.index') }}"
                   class="btn btn-success">

                    <i class="fas fa-users"></i>
                    Gerenciar Usuários

                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6 mb-4">

        <div class="card border-left-success shadow">

            <div class="card-body">

                <h5>Meu Perfil</h5>

                <p>Visualize ou altere seus dados de administrador.</p>

                <a href="{{ route('perfil') }}"
                   class="btn btn-success">

                    <i class="fas fa-user"></i>
                    Acessar Perfil

                </a>

            </div>

        </div>

    </div>

</div>

@endsection