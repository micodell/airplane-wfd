<!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline - coba1</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body>
    @include('components.header')
    <div class="mx-8">
        @yield('content')
    </div>
    @include('components.footer')
</body>
</html>