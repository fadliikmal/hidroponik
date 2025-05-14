<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=League Spartan' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/style.css">

<body>
    <main class="form-page">
        <section class="banner-section">
            <img src="./assets/SelaAwi_logo.png" alt="Logo SelaAwi">
        </section>
        <section class="forgot-section">
            <form action="" method="post">
                <img src="./assets/footer.png" alt="Logo SelaAwi">
                <h1>Anda Lupa Password?</h1>
                <h2>Masukkan Email Anda, Kami Akan Kirimkan Link Untuk Mengganti Password Anda</h2>
                <div class="form-forgot-container">
                    <input type="text" id="Email" name="Email" placeholder="Masukkan Email Anda..." required>
                    <a href="/login.html">
                        <button type="button" class="btn btn-primary-forgot">kirim</button>
                    </a>
                    <a href="./login.html"> Kembali ke Halaman Login</a>
            </form>
        </section>
    </main>
</body>

</html>