<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>social network - @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="text-center">
    <nav class="site-header sticky-top py-1 position-fixed w-100 bg-dark">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2 d-none d-md-inline-block text-white" href="/">Главная</a>
            <a class="py-2 d-none d-md-inline-block text-white" href="/profiles">Профили</a>
            <a class="py-2 d-none d-md-inline-block text-white" href="/comments">Комментарии</a>
        </div>
    </nav>

@yield('content')

</body>
</html>
