<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Page</title>

    <!-- Google Fonts (Opsional) -->
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'League Spartan', sans-serif;
        }
    </style>
</head>
<body>
    <body class="bg-gray-100 font-[League Spartan]">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('assets/SelaAwi_logo.png') }}" alt="Logo SelaAwi" class="h-16">
            </div>
            <h2 class="text-2xl font-bold mb-4 text-center">Lupa Password?</h2>
            <p class="text-sm text-gray-600 mb-6 text-center">
                Masukkan email kamu, kami akan mengirimkan tautan untuk mengatur ulang password.
            </p>
            @if (session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Kirim Link Reset</button>
            </form>
            <p class="mt-4 text-center text-sm">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Kembali ke Login</a>
            </p>
        </div>
    </div>
</body>
</html>
</body>

</html>