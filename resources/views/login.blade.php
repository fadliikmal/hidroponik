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
<body class="bg-gradient-to-br from-green-100 to-white min-h-screen flex items-center justify-center">

    <main class="w-full max-w-7xl bg-white rounded-xl shadow-lg flex flex-col md:flex-row overflow-hidden">

        <!-- Logo Section -->
        <section class="md:w-1/2 bg-green-600 flex items-center justify-center p-8">
            <img src="{{ asset('assets/SelaAwi_logo.png') }}" alt="Logo SelaAwi" class="w-2/3 max-w-xs">
        </section>

        <!-- Form Section -->
        <section class="md:w-1/2 p-8">
            {{-- <form action="{{ route('/login') }}" method="POST" class="space-y-6"> --}}
                @csrf
                <div class="text-center">
                    <img src="{{ asset('assets/footer.png') }}" alt="Logo Footer" class="mx-auto w-24 mb-4">
                    <h2 class="text-2xl font-bold text-green-700">Selamat Datang</h2>
                    <p class="text-sm text-gray-500">di Website BPP SelaAwi</p>
                </div>

                <div>
                    <label for="username" class="block text-gray-700 font-medium">Username</label>
                    <input type="text" id="username" name="username" required
                        class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>

                <div class="flex justify-between items-center text-sm">
                    <a href="{{ url('/forgot') }}" class="text-green-600 hover:underline">Lupa Password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition">
                    Login
                </button>

                <p class="text-center text-sm text-gray-600">Pengguna baru?
                    <a href="{{ url('/register') }}" class="text-green-600 hover:underline">Buat Akun</a>
                </p>
            </form>
        </section>
    </main>

</body>
</html>
