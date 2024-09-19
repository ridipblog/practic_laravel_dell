<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
</head>

<body>
    {{-- ------------ simeple emit and listener for compoent ---------------- --}}
    <livewire:emit-listner.parent-component />
    <livewire:emit-listner.child-component />




    <script>
        // -- --------------- handle event on js code ----------------- --
        document.addEventListener('DOMContentLoaded', function() {

            Livewire.on('childEvent', (data) => {
                console.log('Event handled in JavaScript:', data);
            });
        })
    </script>
    @livewireScripts
</body>

</html>
