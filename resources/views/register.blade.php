<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Page</title>
  <link href="https://fonts.googleapis.com/css?family=League+Spartan" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'League Spartan', sans-serif;
    }
  </style>
</head>

<body class="min-h-screen bg-green-50 flex items-center justify-center">
  <main class="w-full max-w-7xl bg-white rounded-xl shadow-lg flex flex-col md:flex-row overflow-hidden">
    
    <!-- Logo Section -->
    <section class="md:w-2/5 bg-green-600 p-10 flex items-center justify-center">
      <img src="./assets/SelaAwi_logo.png" alt="Logo SelaAwi" class="w-3/4 object-contain">
    </section>

    <!-- Form Section -->
    <section class="md:w-3/5 p-10">
      <form action="" method="post" class="space-y-6">
        <h1 class="text-3xl font-bold text-green-700 mb-2">Registrasi Akun</h1>
        <p class="text-sm text-gray-500 mb-6">Silakan isi data berikut untuk membuat akun baru.</p>

        <div class="space-y-4">
          <div>
            <label for="Nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" id="Nama" name="Nama" placeholder="Nama Lengkap..." required
              class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
          </div>

          <div>
            <label for="Email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="Email" name="Email" placeholder="Email..." required
              class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password..." required
              class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
          </div>

          <div>
            <label for="re-password" class="block text-sm font-medium text-gray-700">Ketik Ulang Password</label>
            <input type="password" id="re-password" name="re-password" placeholder="Ketik Ulang Password..." required
              class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
          </div>
        </div>

        <div class="flex items-center justify-between mt-6">
          <a href="" class="text-sm text-green-600 hover:underline">Sudah punya akun? Masuk</a>
          <button type="submit"
            class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-200">Sign Up</button>
        </div>
      </form>
    </section>
  </main>
</body>

</html>
