<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Login - Gasto Certo</title>

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gasto-certo.css') }}" rel="stylesheet">

    <style>

        body {
            background-image: url("{{ asset('img/fundo-login.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;

            font-family: Arial, sans-serif;

            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0;
        }

        .box {
            width: 400px;

            background: white;

            padding: 35px;

            border-radius: 15px;

            box-shadow: 0 0 25px rgba(0, 0, 0, 0.12);
        }

        .logo {
            text-align: center;
            margin-bottom: 15px;
        }

        .logo img {
            width: 120px;
        }

        .titulo {
            text-align: center;
            color: #2e7d32;
            font-weight: bold;
        }

        .frase {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
        }

        .btn-verde {
            background: #2e7d32;
            color: white;
            width: 100%;
        }

        .btn-verde:hover {
            background: #1b5e20;
            color: white;
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }

    </style>

</head>

<body>

<div class="box">

    <div class="logo">

        <img
            src="{{ asset('img/logo.png') }}"
            alt="Logo"
        >

    </div>

    <h3 class="titulo">
        Gasto Certo
    </h3>

    <p class="frase">
        Controle seus gastos de forma simples.
    </p>


    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger">

            {{ $errors->first() }}

        </div>

    @endif


    <form
        action="{{ route('login.processar') }}"
        method="POST"
    >

        @csrf

        <div class="form-group">

            <label>
                E-mail
            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Digite seu e-mail"
                value="{{ old('email') }}"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Senha
            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Digite sua senha"
                required
            >

        </div>


        <button
            type="submit"
            class="btn btn-verde"
        >
            Entrar
        </button>

    </form>


    <div class="link">

        <a href="{{ route('cadastro') }}">
            Não tem conta? Cadastre-se
        </a>

    </div>

</div>

</body>

</html>