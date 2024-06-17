<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Developer</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



</head>

<body class="bg-light">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100"
        style="background-color: #adb5bd;">
        <h1 class="text-success">Listagem de Produtos</h1>
        <p class="text-success">Desenvolvedor PHP | Laravel </p>
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('produtos.index') }}" class="btn btn-link text-success">Lista de Produtos</a>
            <a href="{{ route('produtos.create') }}" class="btn btn-link text-success">Cadastrar Produto</a>
        </div>
    </div>
    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    @yield('scripts')
</body>

</html>
