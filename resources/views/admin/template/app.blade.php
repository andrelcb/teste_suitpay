<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title') - {{ config('app.name') }}</title>
</head>

<body>
    <section class="container px-4 mx-auto">

        <head>
            @yield('header')
        </head>
        <div class="content">
            @yield('content')
        </div>
        <footer>
            #defaultgootyer
        </footer>
    </section>
</body>

</html>
