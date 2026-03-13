<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Laravel payroll')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="session-id" content="{{ session()->getId() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
  @include('include.header')
  @yield('content')
  </body>

</html>