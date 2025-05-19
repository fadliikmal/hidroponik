<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Suhu</title>
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
    </style>
</head>
<body class="font-['League_Spartan'] bg-[#FAF7EB]">
    <div class="flex min-h-screen">
        <aside class="hidden md:flex flex-col items-center bg-gradient-to-br from-[#118B50] to-[#4A321D] w-64 min-h-screen p-4 text-white justify-between">
            <div class="w-full flex flex-col items-center">
                <img src="{{ asset('assets/logo.png') }}" class="w-48 mb-2">
                <img src="{{ asset('assets/pp.webp') }}" class="w-36 mb-4 rounded-full ">
                <p class="text-lg">Selamat Datang,</p>
                <p class="font-bold text-xl mb-4">User</p>
                <nav class="mt-6 w-full flex-1">
                    <a href="{{ url('/dashboard') }}" class="block py-2 border-b border-white text-2xl text-center sidebar-link {{ request()->is('dashboard') ? 'sidebar-active' : '' }}">🏠 Dashboard</a>
                    <a href="{{ url('/sensor') }}" class="block py-2 border-b border-white text-2xl text-center sidebar-link {{ request()->is('sensor') ? 'sidebar-active' : '' }}">🖥️ Sensor</a>
                </nav>
            </div>
            <div class="w-full">
                <a href="#" class="block py-2 mt-8 border-t border-white text-2xl text-center sidebar-link hover:text-red-400 transition">🚪 Logout</a>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-4">
            <!-- Card Parameter -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- SUHU -->
                <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] rounded-3xl shadow-2xl p-6 flex flex-col items-center hover:scale-105 transition">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xl font-bold text-white tracking-wide">Suhu</span>
                        <span class="ml-2 px-2 py-1 rounded bg-[#EAF2BB] text-xs text-[#3B240C] font-semibold">Normal</span>
                    </div>
                    <div class="flex flex-col justify-center items-center bg-[#4A321D] w-32 h-32 rounded-full shadow-md mb-4 border-4 border-[#FAF7EB]">
                        <div class="text-3xl text-[#FAF7EB] font-bold">25°C</div>
                        <div class="text-sm text-[#FAF7EB]">Saat Ini</div>
                    </div>
                    <div class="text-white mb-1 text-sm">Tertinggi: <span class="font-bold">27°C</span></div>
                    <div class="text-white mb-1 text-sm">Terendah: <span class="font-bold">24.5°C</span></div>
                    <div class="text-white mb-3 text-sm">Rata-rata: <span class="font-bold">26.7°C</span></div>
                    <div class="bg-[#EAF2BB] text-[#3B240C] w-full mt-4 rounded-lg p-2 text-center font-semibold shadow">
                        Alarm: 30°C / -10°C
                    </div>
                </div>
                <!-- PH -->
                <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] rounded-3xl shadow-2xl p-6 flex flex-col items-center hover:scale-105 transition">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xl font-bold text-white tracking-wide">pH</span>
                        <span class="ml-2 px-2 py-1 rounded bg-[#EAF2BB] text-xs text-[#3B240C] font-semibold">Normal</span>
                    </div>
                    <div class="flex flex-col justify-center items-center bg-[#4A321D] w-32 h-32 rounded-full shadow-md mb-4 border-4 border-[#FAF7EB]">
                        <div class="text-3xl text-[#FAF7EB] font-bold">7.00</div>
                        <div class="text-sm text-[#FAF7EB]">Saat Ini</div>
                    </div>
                    <div class="text-white mb-1 text-sm">Tertinggi: <span class="font-bold">7.2</span></div>
                    <div class="text-white mb-1 text-sm">Terendah: <span class="font-bold">6.8</span></div>
                    <div class="text-white mb-3 text-sm">Rata-rata: <span class="font-bold">7.0</span></div>
                    <div class="bg-[#EAF2BB] text-[#3B240C] w-full mt-4 rounded-lg p-2 text-center font-semibold shadow">
                        Alarm: 8.00 / 6.00
                    </div>
                </div>
                <!-- TDS -->
                <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] rounded-3xl shadow-2xl p-6 flex flex-col items-center hover:scale-105 transition">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xl font-bold text-white tracking-wide">TDS</span>
                        <span class="ml-2 px-2 py-1 rounded bg-[#EAF2BB] text-xs text-[#3B240C] font-semibold">Normal</span>
                    </div>
                    <div class="flex flex-col justify-center items-center bg-[#4A321D] w-32 h-32 rounded-full shadow-md mb-4 border-4 border-[#FAF7EB]">
                        <div class="text-3xl text-[#FAF7EB] font-bold">674</div>
                        <div class="text-sm text-[#FAF7EB]">Saat Ini</div>
                    </div>
                    <div class="text-white mb-1 text-sm">Tertinggi: <span class="font-bold">700</span></div>
                    <div class="text-white mb-1 text-sm">Terendah: <span class="font-bold">650</span></div>
                    <div class="text-white mb-3 text-sm">Rata-rata: <span class="font-bold">674</span></div>
                    <div class="bg-[#EAF2BB] text-[#3B240C] w-full mt-4 rounded-lg p-2 text-center font-semibold shadow">
                        Alarm: 800 / 600
                    </div>
                </div>
            </div>
            <!-- Chart Utama -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mt-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                    <span class="text-lg font-bold text-gray-700">Graphical Synopsis</span>
                    <div class="flex gap-2">
                        <!-- Filter Parameter (multi select) -->
                        <button class="px-3 py-1 rounded bg-[#7DBB9C] text-[#3B240C] text-xs font-semibold param-btn active" data-param="temperature">Suhu</button>
                        <button class="px-3 py-1 rounded bg-[#F59E42] text-[#3B240C] text-xs font-semibold param-btn active" data-param="ph">pH</button>
                        <button class="px-3 py-1 rounded bg-[#B29776] text-[#3B240C] text-xs font-semibold param-btn active" data-param="tds">TDS</button>
                    </div>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 rounded bg-[#7DBB9C] text-[#3B240C] text-xs font-semibold time-btn active" data-time="month">Month</button>
                        <button class="px-3 py-1 rounded text-[#74512D] text-xs font-semibold hover:bg-[#EAF2BB] time-btn" data-time="week">Week</button>
                        <button class="px-3 py-1 rounded text-[#74512D] text-xs font-semibold hover:bg-[#EAF2BB] time-btn" data-time="day">Day</button>
                    </div>
                </div>
                <canvas id="mainChart" height="100"></canvas>
                <div class="flex gap-4 mt-4 text-xs text-gray-500">
                    <span class="flex items-center gap-1"><span class="w-3 h-3 rounded" style="background:#7DBB9C"></span>Temperature</span>
                    <span class="flex items-center gap-1"><span class="w-3 h-3 rounded" style="background:#F59E42"></span>pH</span>
                    <span class="flex items-center gap-1"><span class="w-3 h-3 rounded" style="background:#B29776"></span>TDS</span>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Data dummy untuk chart utama
        const chartData = {
            month: {
                labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
                temperature: [30, 40, 60, 90, 70, 50, 40, 60, 70, 80, 90, 100],
                ph: [7, 7.1, 7.2, 7.3, 7.1, 7, 7.2, 7.3, 7.1, 7, 7.2, 7.3],
                tds: [650, 670, 690, 710, 700, 690, 680, 670, 660, 650, 640, 630],
            },
            week: {
                labels: ['Sen','Sel','Rab','Kam','Jum','Sab','Min'],
                temperature: [60, 70, 80, 90, 80, 70, 60],
                ph: [7, 7.1, 7.2, 7.3, 7.1, 7, 7.2],
                tds: [650, 670, 690, 710, 700, 690, 680],
            },
            day: {
                labels: ['00','04','08','12','16','20'],
                temperature: [60, 70, 80, 90, 80, 70],
                ph: [7, 7.1, 7.2, 7.3, 7.1, 7],
                tds: [650, 670, 690, 710, 700, 690],
            }
        };

        const paramColors = {
            temperature: {bg: '#7DBB9C', legend: 'bg-[#7DBB9C]', label: 'Temperature', type: 'bar'},
            ph: {bg: '#F59E42', legend: 'bg-[#EAF2BB]', label: 'pH', type: 'bar'},
            tds: {bg: '#B29776', legend: 'bg-[#B29776]', label: 'TDS', type: 'bar'},
        };

        let currentTime = 'month';
        let activeParams = ['temperature', 'ph', 'tds'];

        let mainChart = new Chart(document.getElementById('mainChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: chartData[currentTime].labels,
                datasets: [
                    {
                        type: 'bar',
                        label: 'Temperature',
                        data: chartData[currentTime].temperature,
                        backgroundColor: paramColors.temperature.bg,
                        borderRadius: 6,
                        order: 1,
                        hidden: false
                    },
                    {
                        type: 'bar',
                        label: 'pH',
                        data: chartData[currentTime].ph,
                        backgroundColor: paramColors.ph.bg,
                        borderRadius: 6,
                        order: 1,
                        hidden: false
                    },
                    {
                        type: 'bar',
                        label: 'TDS',
                        data: chartData[currentTime].tds,
                        backgroundColor: paramColors.tds.bg,
                        borderRadius: 6,
                        order: 1,
                        hidden: false
                    },
                ]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false } },
                    y: { grid: { color: '#F3F4F6' }, beginAtZero: true }
                }
            }
        });

        // Filter waktu
        document.querySelectorAll('.time-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.time-btn').forEach(b => b.classList.remove('bg-[#7DBB9C]', 'text-[#3B240C]', 'active'));
                this.classList.add('bg-[#7DBB9C]', 'text-[#3B240C]', 'active');
                currentTime = this.getAttribute('data-time');
                updateMainChart();
            });
        });

        // Filter parameter (multi select)
        document.querySelectorAll('.param-btn').forEach((btn, idx) => {
            btn.addEventListener('click', function() {
                const param = this.getAttribute('data-param');
                const datasetIdx = Object.keys(paramColors).indexOf(param);
                // Toggle active
                this.classList.toggle('active');
                if (this.classList.contains('active')) {
                    if(param === 'temperature') {
                        this.classList.add('bg-[#7DBB9C]', 'text-[#3B240C]');
                    } else if(param === 'ph') {
                        this.classList.add('bg-[#EAF2BB]', 'text-[#3B240C]');
                    } else if(param === 'tds') {
                        this.classList.add('bg-[#B29776]', 'text-[#3B240C]');
                    }
                    mainChart.data.datasets[datasetIdx].hidden = false;
                } else {
                    this.classList.remove(
                        'bg-[#7DBB9C]','bg-[#EAF2BB]','bg-[#B29776]',
                        'text-[#3B240C]'
                    );
                    mainChart.data.datasets[datasetIdx].hidden = true;
                }
                mainChart.update();
            });
        });

        function updateMainChart() {
            mainChart.data.labels = chartData[currentTime].labels;
            mainChart.data.datasets[0].data = chartData[currentTime].temperature;
            mainChart.data.datasets[1].data = chartData[currentTime].ph;
            mainChart.data.datasets[2].data = chartData[currentTime].tds;
            mainChart.update();
        }
    </script>
</body>
</html>
