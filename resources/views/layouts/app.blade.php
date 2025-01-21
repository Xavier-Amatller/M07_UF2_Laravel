<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h1>Header de la plantilla</h1>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>Footer de la plantilla</p>
    </footer>
</body>
</html>
