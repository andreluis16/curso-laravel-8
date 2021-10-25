<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>

      <!-- Styles -->
</head>
<body>

    <div class="content">
        @yield('content')
    </div>
         <!-- Scripts -->
         <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
