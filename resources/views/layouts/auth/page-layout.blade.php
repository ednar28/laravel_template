<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ config('app.name') }}</title>
</head>

<body class="bg-gray-50">
    <div id="app" class="h-screen flex items-center justify-center">
        <div class="card p-8 w-full max-w-sm">
            <div class="px-4 py-6 card bg-primary-500 text-white text-2xl text-center font-bold -mt-16 mb-6 uppercase">
                {{ config('app.name') }}
            </div>
            @yield('pages')
        </div>
    </div>

</body>

</html>