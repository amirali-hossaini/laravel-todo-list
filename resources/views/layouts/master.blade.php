<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') . ' | ' }} @yield('page')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-primary-gray font-estedad grid grid-cols-6">

    <div class="fixed z-10 xl:sticky w-72 xl:w-full shadow sm:shadow-none xl:col-span-1 h-screen top-0 hidden xl:block"
        id="sidebar">
        @include('layouts.sidebar')
    </div>

    <div class="col-span-6 xl:col-span-5">
        <!-- Desktop Header -->
        @include('layouts.desktop-header')

        <!-- Mobile Header -->
        @include('layouts.mobile-header')

        @yield('content')

    </div>

    @vite('resources/js/app.js')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
</body>

</html>
