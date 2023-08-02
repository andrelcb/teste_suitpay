<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body class="font-sans antialiased">
    <div class="container px-4 mx-auto py-4">
        <!-- Page Heading -->
        @yield('header')

        <!-- Page Content -->
        <main>
            <x-message />
            @yield('content')
        </main>
    </div>
</body>

</html>
