<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="cupcake">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Shop | Rocket22</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  {{-- Make sure you have this --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- TinyMCE --}}
  <script src="https://cdn.tiny.cloud/1/86z9mqpamxj7nat92312wl1goqieuaduddcyuk8z2zr45d2u/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body class="font-sans antialiased">
  <x-dashboard-navbar />
  <x-main with-nav full-width>
    <x-sidebar />
    <x-slot:content>
      {{ $slot }}
    </x-slot:content>
  </x-main>
  <x-toast />
</body>
</html>
