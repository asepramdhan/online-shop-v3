<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Online Shop | Rocket22</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">

  <x-dashboard-navbar />

  <x-main with-nav full-width>

    <x-sidebar-messages />

    <x-slot:content>

      {{ $slot }}

    </x-slot:content>

  </x-main>

  <x-toast />

</body>

</html>
