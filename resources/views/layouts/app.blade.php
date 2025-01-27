<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>
<body>
    <header>
        <h1>CABECERA DE LA WEB (MASTER)</h1>
        <img src="#" alt="IMAGEN CABECERA">
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <h1>PIE DE PAGINA (MASTER)</h1>
        <img src="#" alt="IMAGEN PIE DE PAGINA">
    </footer>
</body>
</html>
