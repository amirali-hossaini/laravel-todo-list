<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') . ' | ' }} @yield('page')</title>

    @vite('resources/css/app.css')

</head>

<body class="bg-primary-gray font-estedad flex items-center justify-center h-screen">

    <main class="p-6 w-full mx-auto">

        <h1 class="text-3xl pb-4 text-center">{{ config('app.name') }}</h1>

        @yield('content')

    </main>

    @vite('resources/js/app.js')
</body>

</html>
