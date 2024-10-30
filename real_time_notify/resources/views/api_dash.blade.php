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
{{$user->id ?? 'N/A'}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- ------------- IS UED NPM RUN BUILD WITH  VITE START ------------- --}}

    {{-- <script type="module" src="{{ asset('build/assets/app-5c9b90c8.js') }}"></script> --}}
    {{-- ------------- IS UED NPM RUN BUILD WITH  VITE END ------------- --}}

    {{-- ------------- IS UED NPM RUN BUILD WITH  MIX START ------------- --}}

    <script src="{{ asset('js/app.js') }}"></script>

    {{-- ------------- IS UED NPM RUN BUILD WITH  MIX END ------------- --}}
    <script>
        // {{-- ------------- IS UED NPM RUN BUILD WITH  VITE START ------------- --}}
        var num={{$user->id}}
var room='info.'+num;
console.log(room);
        // document.addEventListener('DOMContentLoaded', () => {
        //     window.Echo.channel('room').listen('InfoEvent', (e) => {
        //         console.log(e);
        //         console.log(e.message);
        //     });
        // });

        // {{-- ------------- IS UED NPM RUN BUILD WITH  VITE END ------------- --}}

        Echo.private(room).listen('InfoEvent', (e) => {
            console.log(e);
            console.log(e.message);
        });
    </script>
</body>
</html>
