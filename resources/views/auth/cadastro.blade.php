<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Cadastro - Gasto Certo</title>

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
            width: 420px;

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
        Crie sua conta e comece a se organizar.
    </p>


    <form
        action="{{ route('cadastro.processar') }}"
        method="POST"
    >

        @csrf

        <div class="form-group">

            <label>
                Nome
            </label>

            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Digite seu nome"
                value="{{ old('name') }}"
                required
            >

        </div>


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


        <div class="form-group">

            <label>
                Confirmar senha
            </label>

            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                placeholder="Confirme sua senha"
                required
            >

        </div>


        <button
            type="submit"
            class="btn btn-verde"
        >
            Cadastrar
        </button>


        @if($errors->any())

            <div class="alert alert-danger mt-3">

                <ul class="mb-0">

                    @foreach($errors->all() as $erro)

                        <li>{{ $erro }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

    </form>


    <div class="link">

        <a href="{{ route('login') }}">
            Já tem conta? Entrar
        </a>

    </div>

</div>

</body>

</html>