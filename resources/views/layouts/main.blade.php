<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    @include('components.navbar-dashboard')
    @include('components.sidebar-dashboard')

    <div class="container">

        @yield('content')


        @include('components.footer-dashboard')
    </div>

    <script src=" {{ asset('js/jquery.min.js') }} "></script>
    <script src=" {{ asset('js/axios.min.js') }} "></script>
    <script src="{{ asset('js/sidebar.min.js') }}"></script>
    @stack('other-scripts')
</body>

</html>