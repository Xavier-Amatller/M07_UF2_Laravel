<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body>
    
    <header class="bg-dark text-white text-center py-3">
        <h1>CABECERA DE LA WEB (MASTER)</h1>
        <img src="{{ asset('imgs/White And Black Gradient Coming Soon Email Header.png') }}" alt="IMAGEN PIE DE PAGINA">
        </header>
    <main class="container my-4">
        @yield('content')
    </main>
    <footer class="bg-dark text-white text-center py-3">
        <h1>PIE DE PAGINA (MASTER)</h1>
        <img src="{{ asset('imgs/Purple Sky Profile Header.png') }}" alt="IMAGEN PIE DE PAGINA">
        </footer>
</body>

</html>
