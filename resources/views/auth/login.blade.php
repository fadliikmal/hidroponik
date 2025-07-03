<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Page</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
    <!-- Google Fonts (Opsional) -->
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'League Spartan', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-green-100 to-white min-h-screen flex items-center justify-center">

    <main class="w-full max-w-7xl bg-white rounded-xl shadow-lg flex flex-col md:flex-row overflow-hidden">

        <!-- Logo Section -->
        <section class="md:w-1/2 bg-green-600 flex items-center justify-center p-8">
            <img src="{{ asset('assets/SelaAwi_logo.png') }}" alt="Logo SelaAwi" class="w-2/3 max-w-xs">
        </section>

        <!-- Form Section -->
        <section class="md:w-1/2 p-8">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

            @if($errors->has('email'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                Email atau password salah.
            </div>
            @endif

            @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('email') }}" />
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="mb-4 text-right">
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Lupa password?</a>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Login</button>
            </form>
            <p class="mt-4 text-center text-sm">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar</a></p>
        </section>
    </main>

</body>
</html>
