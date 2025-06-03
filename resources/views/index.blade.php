<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=League+Spartan" rel="stylesheet">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="https://dashboard-iot.labfit.id/assets/css/style.css">

    <title>Landing Page</title>
</head>

<body>
    <main class="page">
        <nav class="navbar">
            <div class="nav-header">
                <a href="#hero-section" class="nav-logo">
                    <img src="{{ asset('assets/logo.png') }}" alt="BPP SelaAwi" />
                </a>
            </div>
            <div class="nav-links">
                <div class="nav-link login-link">
                    <a href="{{ url('/login') }}" class="btn">Login</a>
                </div>
            </div>
        </nav>

        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <header class="hero" id="hero-section">
                        <div class="hero-container">
                            <div class="hero-texts">
                                <h3 class="hero-text">BPP SelaAwi</h3>
                                <h1 class="hero-text">GREEN HOUSE TANAMAN HIDROPONIK</h1>
                                <h3 class="hero-text">
                                    Pemantauan Suhu, kelembapan, dan pH dalam memenuhi kebutuhan produktivitas tanaman Hidroponik
                                </h3>
                                <div class="hero-text hero-buttons">
                                    <a href="{{ url('/login') }}" class="hero-button">Enviroment</a>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>

                <div class="carousel-item">
                    <section class="about-page" id="about-section">
                        <div class="about-text">
                            <h2>Apa Yang Kita Lakukan</h2>
                            <p>
                                Pertanian hidroponik merupakan metode pertanian modern yang efisien dalam penggunaan air dan lahan.
                                Namun demikian, keberhasilan budidaya hidroponik bergantung pada pengaturan parameter lingkungan
                                seperti suhu, kelembaban dan PH, yang harus terus dipantau dan disesuaikan untuk memenuhi kebutuhan
                                tanaman. Dengan demikian, untuk mendukung keberhasilan pertanian hidroponik serta mempermudah
                                pemantauan dan pengaturan parameter, dalam aplikasi ini pengguna dapat memantau perkembangan suhu,
                                kelembapan, dan PH tanaman secara real time dengan mengintegrasikan teknologi IoT dan kecerdasan
                                buatan (AI) untuk optimasi lingkungan tumbuh tanaman hidroponik dalam green house.
                            </p>
                        </div>
                        <div class="about-image">
                            <div class="top-row">
                                <img src="{{ asset('assets/parameter.jpg') }}" alt="parameter hidroponik" class="img2">
                            </div>
                            <div class="bottom-column">
                                <div class="bottom-row">
                                    <img src="{{ asset('assets/test ph.jpg') }}" alt="kalibrasi parameter" class="img3">
                                    <img src="{{ asset('assets/hasil pakcoy.png') }}" alt="Pakcoy Hidroponik" class="img1">
                                </div>
                                <img src="{{ asset('assets/discuss1.jpg') }}" alt="uji coba aplikasi" class="img4">
                            </div>
                        </div>
                    </section>
                </div>

                <div class="carousel-item">
                    <section class="research-page" id="research-section">
                        <h2>KLASIFIKASI TANAMAN</h2>
                        <h4>Tanaman Yang Tersedia Saat Ini</h4>
                        <ul class="research-lists">
                            <li class="research-list">
                                <img src="{{ asset('assets/Screenshot 2025-02-08 220859.png') }}" alt="Pakcoy">
                                <p>Pakcoy</p>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <footer class="footer">
            <img src="{{ asset('assets/footer.png') }}" alt="BPP SelaAwi">
            <div class="info-container">
                <h3>Website BPP SelaAwi</h3>
                <p>
                    Aplikasi berbasis web yang dapat membantu pengguna dengan memberikan informasi perkembangan suhu,
                    kelembapan, dan PH tanaman
                </p>
            </div>
            <div class="contact-container">
                <p>Kunjungi Kami Di:</p>
                <ul class="contact-container-lists">
                    <i class="fa-solid fa-location-dot"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-regular fa-envelope"></i>
                </ul>
                <p>Hubungi:</p>
                <p>xxx-xxx-xxx</p>
            </div>
        </footer>
    </main>
</body>

</html>
