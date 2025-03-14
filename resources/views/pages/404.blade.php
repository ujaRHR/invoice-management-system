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
    <title>404 | DySiq Invoice</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-800 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-9xl font-extrabold text-primary-600 dark:text-primary-500">404</h1>
        <p class="text-4xl font-bold text-gray-900 dark:text-white mt-4">Something's missing.</p>
        <p class="text-lg text-gray-500 dark:text-gray-400 mt-2">Sorry, we can't find that page. You'll find lots to explore on the home page.</p>
        <a href="#" class="mt-6 inline-block px-6 py-3 text-lg font-medium text-white bg-primary-600 hover:bg-primary-800 rounded-lg focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-900">Back to Homepage</a>
    </div>
</body>

</html>