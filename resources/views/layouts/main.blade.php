<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-800">
    @include('components.navbar-dashboard')
    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        @include('components.sidebar-dashboard')
        <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>
                @yield('content')
            </main>
            @include('components.footer-dashboard')
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/sidebar.min.js') }}"></script>
    <script src="{{ asset('js/buttons.js') }}"></script>
    <script src="{{ asset('js/app.bundle.js') }}"></script>
    <script src="{{ asset('js/datepicker.min.js')}}"></script>
    @stack('other-scripts')
</body>

</html>