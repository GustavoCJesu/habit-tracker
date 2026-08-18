<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>

    <body class="bg-[#FFEDD6] min-h-screen flex flex-col justify-between font-mono">

        <x-header/>

        {{ $slot }}

        <x-footer />
    </body>

</html>
