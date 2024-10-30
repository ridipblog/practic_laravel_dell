<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- {{dd($user)}} --}}
    {{ $user->id ?? 'N/A' }}
    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
<!-- Include Laravel Echo from CDN -->
<script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</script>

</body>

</html>
