<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel payroll')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/360.jpg') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="session-id" content="{{ session()->getId() }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="flex">
        @include('include.admin-sidebar')

        <div class="flex-1 ml-64 bg-gray-100 min-h-screen">

            @include('include.admin-header')

            <main class="p-8">
                @yield('content')
            </main>

        </div>
    </div>


</body>

</html>
