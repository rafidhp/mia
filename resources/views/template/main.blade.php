<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{ asset('images/logo-notext.svg') }}" type="image/x-icon">
  <title>@yield('title') Inspira</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  @livewireStyles

  @stack('css')

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative">

  @yield('content')

  @livewireScripts

  @stack('script')

</body>
</html>
