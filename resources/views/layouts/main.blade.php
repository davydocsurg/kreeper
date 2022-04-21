<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kreeper</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/kreeper.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">

    <!-- Scripts -->
    <!-- <script src="{{ asset('dist/js/vendor/jquery-slim.min.js') }}" defer></script> -->
    <!-- <script src="{{ asset('dist/js/jquery-3.3.1.slim.min.js') }}" defer></script> -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('dist/js/swipe.min.js') }}" defer></script>
    <script src="{{ asset('dist/js/vendor/popper.min.js') }}" defer></script>
    <!-- <script src="{{ asset('dist/js/bootstrap.min.js') }}" defer></script> -->
    <script src="dist/js/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <!-- <script>
        function scrollToBottom(el) {
            el.scrollTop = el.scrollHeight;
        }
        scrollToBottom(document.getElementById('content'));
    </script> -->

    <!-- <script>
        window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    'user' => [
        'authenticated' => auth()->check(),
        'id' => auth()->check() ? auth()->user()->id : null,
        'name' => auth()->check() ? auth()->user()->name : null,
    ],
]) !!};
    </script> -->

</head>

<body>

    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>

    <script>
        // $(function() {
        //     $('[data-toggle="tooltip"]').tooltip()
        //     $('#example').tooltip(options)
        // })
    </script>

</body>

</html>
