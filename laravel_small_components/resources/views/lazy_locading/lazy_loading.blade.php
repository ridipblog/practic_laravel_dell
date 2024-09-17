<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        #content {
            background: red;
        }

        .member {
            width: 50px;
            height: 100px;
        }
    </style>
</head>

<body>

    <div id="content">
        @foreach ($members as $member)
            <div class="member">
                <h3>{{ $member->name }}</h3>
                <p>{{ $member->roll }}</p>
            </div>
        @endforeach
    </div>

    {{-- <div id="load-more">Loading...</div> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/lazy_loading.js') }}"></script>
    <script></script>

</body>

</html>
