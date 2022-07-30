<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="/favicon.png" width="32"/>
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
      @vite(['resources/css/app.css','resources/css/styles.css', 'resources/js/app.js', 'resources/js/drop.js', 'resources/css/drop.css','./node_modules/flowbite/dist/flowbite.js','./node_modules/flowbite/dist/flowbite.css'])

    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
