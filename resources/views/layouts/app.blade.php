<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Tugas 11</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
<nav class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('products.index') }}" class="font-bold">E-Commerce Tugas 11</a>
        <div class="flex items-center gap-4">
            @auth
                <span>{{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-red-600 px-3 py-1 rounded">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>
</nav>

@yield('content')
</body>
</html>