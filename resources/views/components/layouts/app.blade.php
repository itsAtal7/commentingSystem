<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">

    {{ $slot }}

    @livewireScripts
</body>
</html>
