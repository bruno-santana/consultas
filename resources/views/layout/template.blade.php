<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/b0d8aefb17.js" crossorigin="anonymous"></script>

    <title>@yield('titulo')</title>
  </head>
  <body>
    <div class="container">
      @yield('conteudo')
    </div>
  </body>
</html>