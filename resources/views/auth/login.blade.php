<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Commerce Tugas 11</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded shadow w-full max-w-md">
    <h1 class="text-2xl font-bold mb-6">Login E-Commerce</h1>
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full border p-2 rounded">
        <input type="password" name="password" placeholder="Password" class="w-full border p-2 rounded">
        <label><input type="checkbox" name="remember"> Ingat saya</label>
        <button class="w-full bg-blue-600 text-white py-2 rounded">Login</button>
    </form>
    <p class="mt-4">Belum punya akun? <a class="text-blue-600" href="{{ route('register') }}">Register</a></p>
</div>
</body>
</html>