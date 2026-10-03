<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Gasto Certo</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gasto-certo.css') }}" rel="stylesheet">

    <style>

        .sidebar{
            width:120px !important;
            min-width:120px !important;
        }

        .area-logo{
            text-align:center;
            padding:20px 0 15px 0;
        }

        .logo-redonda{
            width:75px;
            height:75px;
            border-radius:50%;
            object-fit:contain;
            background:white;
            padding:6px;
        }

        .sidebar .nav-item{
            width:100%;
        }

        .sidebar .nav-item .nav-link{
            width:100%;
            padding:18px 5px;
            color:white;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }

        .sidebar .nav-item .nav-link i{
            font-size:22px;
            margin-bottom:6px;
        }

        .sidebar .nav-item .nav-link span{
            font-size:12px;
        }

        .nav-item.active{
            background:rgba(255,255,255,.15);
            border-left:4px solid white;
        }

        .topbar{
            background:#e8f5e9 !important;
        }

    </style>

</head>

<body id="page-top">

<div id="wrapper">

    <!-- Sidebar -->

    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <div class="area-logo">

            <a href="{{ auth()->user()->tipo === 'admin' ? route('admin.dashboard') : route('dashboard') }}">

                <img src="{{ asset('img/logo.png') }}" class="logo-redonda">

            </a>

        </div>

        <hr class="sidebar-divider">

        @if(auth()->user()->tipo === 'admin')

            <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                <a class="nav-link" href="{{ route('admin.dashboard') }}">

                    <i class="fas fa-user-shield"></i>

                    <span>Administração</span>

                </a>

            </li>

            <li class="nav-item {{ request()->routeIs('perfil*') ? 'active' : '' }}">

                <a class="nav-link" href="{{ route('perfil') }}">

                    <i class="fas fa-user"></i>

                    <span>Perfil</span>

                </a>

            </li>

        @else

            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                <a class="nav-link" href="{{ route('dashboard') }}">

                    <i class="fas fa-home"></i>

                    <span>Início</span>

                </a>

            </li>

            <li class="nav-item {{ request()->routeIs('gastos*') ? 'active' : '' }}">

                <a class="nav-link" href="{{ route('gastos') }}">

                    <i class="fas fa-wallet"></i>

                    <span>Gastos</span>

                </a>

            </li>

            <li class="nav-item {{ request()->routeIs('categorias*') ? 'active' : '' }}">

                <a class="nav-link" href="{{ route('categorias') }}">

                    <i class="fas fa-tags"></i>

                    <span>Categorias</span>

                </a>

            </li>

            <li class="nav-item {{ request()->routeIs('perfil*') ? 'active' : '' }}">

                <a class="nav-link" href="{{ route('perfil') }}">

                    <i class="fas fa-user"></i>

                    <span>Perfil</span>

                </a>

            </li>

        @endif

    </ul>

    <!-- Conteúdo -->

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <!-- Topbar -->

            <nav class="navbar navbar-expand navbar-light topbar mb-4 shadow">

                <span class="ml-3 font-weight-bold text-success">

                    Gasto Certo

                </span>

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item mr-3 mt-2">

                        <strong>{{ auth()->user()->name }}</strong>

                    </li>

                    <li class="nav-item">

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button class="btn btn-danger btn-sm">

                                <i class="fas fa-sign-out-alt"></i>

                                Sair

                            </button>

                        </form>

                    </li>

                </ul>

            </nav>

            <div class="container-fluid">

                @yield('conteudo')

            </div>

        </div>

    </div>

</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>
</html>