<?php

declare(strict_types=1);

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-elevation-surface h-full">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Reddit-like Home • Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet" />
        <!-- Styles / Scripts -->
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-full">
        <!-- sidebar -->
        <livewire:community-sidebar />

        <div class="ml-[352px] flex h-screen flex-col">
            <!-- Top Nav -->
            <x-navbar />

            <!-- Content -->
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>

<?php
