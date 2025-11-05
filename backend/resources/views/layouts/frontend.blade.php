<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Northampton News</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- HEADER -->
    <header class="bg-blue-900 text-white py-6 shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-3xl md:text-4xl font-bold italic tracking-wide">Northampton News</h1>
        </div>
    </header>

    <!-- NAVIGATION -->
    <nav class="bg-gray-900 text-white">
        <ul class="flex flex-wrap justify-center max-w-6xl mx-auto px-4">
            <li><a href="{{ url('/') }}" class="block px-4 py-3 hover:bg-blue-800">Home</a></li>
            <li><a href="{{ url('/latest') }}" class="block px-4 py-3 hover:bg-blue-800">Latest Articles</a></li>
            <li><a href="{{ url('/connect') }}" class="block px-4 py-3 hover:bg-blue-800">Contact Us</a></li>
            <li class="relative group">
                <a href="#" class="block px-4 py-3 hover:bg-blue-800">Select Category ▾</a>
                <ul class="absolute hidden group-hover:block bg-gray-800 w-48">
                    @include('custom.navigation')
                </ul>
            </li>
        </ul>
    </nav>

    <!-- BANNER -->
    <div class="w-full overflow-hidden">
        <img src="{{ asset('images/banners/randombanner.php') }}" alt="Random Banner" class="w-full h-64 object-cover">

    </div>

    <!-- MAIN CONTENT -->
    <main class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 py-10 px-4">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-400 text-center py-4 mt-10">
        &copy; Northampton News {{ date('Y') }}. All Rights Reserved. Powered by Krishna Karki
    </footer>

</body>
</html>
