<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ config('app.name') }}</title>
</head>
<body class="bg-gray-50">
    <div id="app" class="h-screen flex flex-col">
        @include('layouts.dashboard.component-sidebar')
        <div class="md:ml-64 flex flex-col h-full">
            @include('layouts.dashboard.component-navbar')
            <div class="container pt-8 h-full overflow-auto">
                @yield('pages')
            </div>
        </div>
    </div>

</body>

</html>
