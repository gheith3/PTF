<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
<!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@latest/dist/css/tabler.min.css">

@livewireStyles

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/@tabler/core@latest/dist/js/tabler.min.js"></script>

</head>
<body class="font-sans antialiased bg-light">
{{--        <x-jet-banner />--}}
@livewire('navigation-menu')

<!-- Page Heading -->
{{--        <header class="d-flex py-3 bg-white shadow-sm border-bottom">--}}
{{--            <div class="container">--}}
{{--                {{ $header }}--}}
{{--            </div>--}}
{{--        </header>--}}

<!-- Page Content -->
<main class="container mt-4">
    {{ $slot }}
    <br>
</main>

@stack('modals')

@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@stack('scripts')
<script>
    window.addEventListener('swal:modal', event => {

        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
        });
    });


</script>
</body>
</html>
