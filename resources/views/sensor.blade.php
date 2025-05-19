<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <title>Sensor</title>
    <style>
        .sidebar-link {
            transition: transform 0.15s, font-weight 0.15s, color 0.15s;
        }
        .sidebar-link:hover {
            transform: scale(1.07);
            font-weight: bold;
            color: #fff !important;
        }
        .sidebar-active {
            color: #fff !important;
            font-weight: bold;
            transform: scale(1.07);
        }
        .btn-detail {
            background: linear-gradient(90deg, #74512D 0%, #A88F6A 100%);
            color: #fff;
            font-weight: 600;
            box-shadow: 0 4px 16px 0 #74512d33;
            transition: transform 0.15s, box-shadow 0.15s, background 0.15s;
        }
        .btn-detail:hover {
            background: linear-gradient(90deg, #3B240C 0%, #A88F6A 100%);
            color: #fff;
            transform: scale(1.06) translateY(-2px);
            box-shadow: 0 8px 24px 0 #74512d55;
        }
    </style>
</head>
<body class="bg-[#FBF6E9] flex">
    <!-- Sidebar -->
    <aside class="hidden md:flex flex-col items-center bg-gradient-to-br from-[#118B50] to-[#4A321D] w-64 min-h-screen p-4 text-white justify-between">
        <div class="w-full flex flex-col items-center">
            <img src="{{ asset('assets/logo.png') }}" class="w-48 mb-2">
            <img src="{{ asset('assets/pp.webp') }}" class="w-36 mb-4 rounded-full ">
            <p class="text-lg">Selamat Datang,</p>
            <p class="font-bold text-xl mb-4">User</p>
            <nav class="mt-6 w-full flex-1">
                <a href="{{ url('/dashboard') }}" class="block py-2 border-b border-white text-2xl  text-center sidebar-link {{ request()->is('dashboard') ? 'sidebar-active' : '' }}">🏠 Dashboard</a>
                <a href="{{ url('/sensor') }}" class="block py-2 border-b border-white text-2xl text-center sidebar-link {{ request()->is('sensor') ? 'sidebar-active' : '' }}">🖥️ Sensor</a>
            </nav>
        </div>
        <div class="w-full">
            <a href="#" class="block py-2 mt-8 border-t border-white text-2xl text-center sidebar-link hover:text-red-400 transition">🚪 Logout</a>
        </div>
    </aside>
    <main class="flex-grow p-4 md:p-6">
        <h2 class="text-4xl text-[#41270C] font-bold mb-3">Data Parameter Tanaman</h2>
        <div class="relative inline-block mt-2 mb-4">
            <button id="dropdownButton" class="bg-[#74512D] text-white py-2 px-4 rounded-md flex items-center gap-2">
                <span id="dropdownIcon">🌱</span>
                <span id="dropdownLabel">Semua</span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <ul id="dropdownMenu" class="hidden absolute bg-[#74512D] text-white mt-2 w-full rounded-md z-10">
                <li><a href="#" class="block px-4 py-2 flex items-center gap-2" data-filter="pakcoy" data-icon="🥬">🥬 Pakcoy</a></li>
                <li><a href="#" class="block px-4 py-2 flex items-center gap-2" data-filter="seledri" data-icon="🌿">🌿 Seledri</a></li>
                <li><a href="#" class="block px-4 py-2 flex items-center gap-2" data-filter="selada" data-icon="🥗">🥗 Selada</a></li>
                <li><a href="#" class="block px-4 py-2 flex items-center gap-2" data-filter="semua" data-icon="🌱">🌱 Semua</a></li>
            </ul>
        </div>

        <div id="plantData" class="mt-4 space-y-8">
            <!-- Pakcoy Card -->
            <div class="filter-item pakcoy">
                <h2 class="text-center text-4xl font-bold text-[#41270C] mb-3">PAKCOY</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Suhu -->
                    <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] rounded-2xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition">
                        <div class="text-4xl font-bold text-white mb-1">25°C</div>
                        <div class="text-white text-sm mb-1">Suhu</div>
                        <div class="text-xs text-white">Tertinggi: <b>27°C</b></div>
                        <div class="text-xs text-white">Terendah: <b>24.5°C</b></div>
                        <div class="text-xs text-white">Rata-rata: <b>26.7°C</b></div>
                    </div>
                    <!-- pH -->
                    <div class="bg-gradient-to-br from-[#4A321D] to-[#118B50] rounded-2xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition">
                        <div class="text-4xl font-bold text-white mb-1">7.00</div>
                        <div class="text-white text-sm mb-1">pH</div>
                        <div class="text-xs text-white">Tertinggi: <b>7.2</b></div>
                        <div class="text-xs text-white">Terendah: <b>6.8</b></div>
                        <div class="text-xs text-white">Rata-rata: <b>7.0</b></div>
                    </div>
                    <!-- TDS -->
                    <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] rounded-2xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition">
                        <div class="text-4xl font-bold text-white mb-1">674</div>
                        <div class="text-white text-sm mb-1">TDS</div>
                        <div class="text-xs text-white">Tertinggi: <b>700</b></div>
                        <div class="text-xs text-white">Terendah: <b>650</b></div>
                        <div class="text-xs text-white">Rata-rata: <b>674</b></div>
                    </div>
                </div>
                <div class="flex justify-center mt-3">
                    <a href="{{ url('/sensor/detail') }}" class="btn-detail px-6 py-2 rounded-lg flex items-center gap-2">
                        <span>Detail Sensor</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Seledri Card -->
            <div class="filter-item seledri">
                <h2 class="text-center text-4xl font-bold text-[#41270C] mb-3">SELEDRI</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] rounded-2xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition">
                        <div class="text-4xl font-bold text-white mb-1">22°C</div>
                        <div class="text-white text-sm mb-1">Suhu</div>
                        <div class="text-xs text-white">Tertinggi: <b>24°C</b></div>
                        <div class="text-xs text-white">Terendah: <b>21°C</b></div>
                        <div class="text-xs text-white">Rata-rata: <b>22.5°C</b></div>
                    </div>
                    <div class="bg-gradient-to-br from-[#4A321D] to-[#118B50] rounded-2xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition">
                        <div class="text-4xl font-bold text-white mb-1">6.50</div>
                        <div class="text-white text-sm mb-1">pH</div>
                        <div class="text-xs text-white">Tertinggi: <b>7.0</b></div>
                        <div class="text-xs text-white">Terendah: <b>6.3</b></div>
                        <div class="text-xs text-white">Rata-rata: <b>6.7</b></div>
                    </div>
                    <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] rounded-2xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition">
                        <div class="text-4xl font-bold text-white mb-1">700</div>
                        <div class="text-white text-sm mb-1">TDS</div>
                        <div class="text-xs text-white">Tertinggi: <b>730</b></div>
                        <div class="text-xs text-white">Terendah: <b>690</b></div>
                        <div class="text-xs text-white">Rata-rata: <b>705</b></div>
                    </div>
                </div>
                <div class="flex justify-center mt-3">
                    <a href="{{ url('/sensor/detail') }}" class="btn-detail px-6 py-2 rounded-lg flex items-center gap-2">
                        <span>Detail Sensor</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Selada Card -->
            <div class="filter-item selada">
                <h2 class="text-center text-4xl font-bold text-[#41270C] mb-3">SELADA</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] rounded-2xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition">
                        <div class="text-4xl font-bold text-white mb-1">20°C</div>
                        <div class="text-white text- mb-1">Suhu</div>
                        <div class="text-xs text-white">Tertinggi: <b>22°C</b></div>
                        <div class="text-xs text-white">Terendah: <b>19°C</b></div>
                        <div class="text-xs text-white">Rata-rata: <b>20.5°C</b></div>
                    </div>
                    <div class="bg-gradient-to-br from-[#4A321D] to-[#118B50] rounded-2xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition">
                        <div class="text-4xl font-bold text-white mb-1">6.00</div>
                        <div class="text-white text-sm mb-1">pH</div>
                        <div class="text-xs text-white">Tertinggi: <b>6.5</b></div>
                        <div class="text-xs text-white">Terendah: <b>5.8</b></div>
                        <div class="text-xs text-white">Rata-rata: <b>6.2</b></div>
                    </div>
                    <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] rounded-2xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition">
                        <div class="text-4xl font-bold text-white mb-1">650</div>
                        <div class="text-white text-sm mb-1">TDS</div>
                        <div class="text-xs text-white">Tertinggi: <b>670</b></div>
                        <div class="text-xs text-white">Terendah: <b>640</b></div>
                        <div class="text-xs text-white">Rata-rata: <b>655</b></div>
                    </div>
                </div>
                <div class="flex justify-center mt-3">
                    <a href="{{ url('/sensor/detail') }}" class="btn-detail px-6 py-2 rounded-lg flex items-center gap-2">
                        <span>Detail Sensor</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <script>
        // Sidebar active effect
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('sidebar-active'));
                this.classList.add('sidebar-active');
            });
        });

        // Dropdown tanaman
        document.getElementById("dropdownButton").addEventListener("click", function() {
            document.getElementById("dropdownMenu").classList.toggle("hidden");
        });
        document.querySelectorAll("#dropdownMenu a").forEach(item => {
            item.addEventListener("click", function (event) {
                event.preventDefault();
                let filter = this.getAttribute("data-filter");
                let icon = this.getAttribute("data-icon");
                document.getElementById("dropdownLabel").textContent = this.textContent.trim();
                document.getElementById("dropdownIcon").textContent = icon;
                document.querySelectorAll(".filter-item").forEach(section => {
                    section.style.display = (filter === "semua" || section.classList.contains(filter)) ? "block" : "none";
                });
                document.getElementById("dropdownMenu").classList.add("hidden");
            });
        });
    </script>
</body>
</html>