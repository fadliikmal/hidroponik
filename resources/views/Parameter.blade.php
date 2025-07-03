<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <title>Parameter</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
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
<body class="bg-[#FBF6E9] flex">
    <!-- Sidebar -->
    <aside class="hidden md:flex flex-col items-center bg-gradient-to-br from-[#118B50] to-[#4A321D] w-64 min-h-screen p-4 text-white justify-between">
        <div class="w-full flex flex-col items-center">
            <img src="{{ asset('assets/logo.png') }}" class="w-48 mb-2">
            <img src="{{ asset('assets/pp.webp') }}" class="w-36 mb-4 rounded-full ">
            <p class="text-lg">Selamat Datang,</p>
            <p class="font-bold text-xl mb-4">User</p>
            <nav class="mt-6 w-full flex-1">
                <a href="{{ url('/dashboard') }}" class="block py-2 border-b border-white text-2xl font-bold text-center sidebar-link {{ request()->is('dashboard') ? 'sidebar-active' : '' }}"> Dashboard</a>
                <a href="{{ url('/sensor') }}" class="block py-2 border-b border-white text-2xl text-center sidebar-link {{ request()->is('sensor') ? 'sidebar-active' : '' }}"> Sensor</a>
            </nav>
        </div>
        <div class="w-full">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full py-2 mt-8 border-t border-white text-2xl text-center sidebar-link hover:text-red-400 transition bg-transparent"> Logout</button>
            </form>
        </div>
    </aside>
    <main class="flex-grow p-6">
        <h1 class="text-4xl font-bold text-[#41270C] mb-2">Dashboard Hidroponik</h1>
        <p class="text-[#74512D] mb-6">Pantau kondisi tanaman dan sistem hidroponik Anda secara real-time.</p>
        
        <!-- Ringkasan status & notifikasi -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4 mb-8">
            <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] text-white p-4 rounded-2xl shadow-lg text-center flex flex-col items-center hover:scale-105 transition">
                <div class="text-4xl font-bold">1</div>
                <div class="text-sm">Sensor Aktif</div>
            </div>
            <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] text-white p-4 rounded-2xl shadow-lg text-center flex flex-col items-center hover:scale-105 transition">
                <div class="text-4xl font-bold">0</div>
                <div class="text-sm">Alarm Aktif</div>
            </div>
            <div class="bg-gradient-to-br from-[#118B50] to-[#4A321D] text-white p-4 rounded-2xl shadow-lg text-center flex flex-col items-center hover:scale-105 transition">
                <div class="text-4xl font-bold">Normal</div>
                <div class="text-sm">Status Sistem</div>
            </div>
        </div>

        <!-- Grafik tren rata-rata parameter -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                <span class="text-lg font-bold text-gray-700">Tren Rata-rata Parameter</span>
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
            <canvas id="mainChart" height="80"></canvas>
            <div class="flex gap-4 mt-4 text-xs text-gray-500">
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded" style="background:#7DBB9C"></span>Temperature</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded" style="background:#F59E42"></span>pH</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded" style="background:#B29776"></span>TDS</span>
            </div>
        </div>
        <!-- Card tanaman sudah dipindah ke halaman Sensor -->
    </main>
    <script>
        // Sidebar active effect
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('sidebar-active'));
                this.classList.add('sidebar-active');
            });
        });

        // Data dari backend
        const chartLabels = {!! json_encode($chartData->pluck('record_date')) !!};
        const suhuData = {!! json_encode($chartData->pluck('suhu')->map(fn($v) => (float)$v)) !!};
        const phData = {!! json_encode($chartData->pluck('pH')->map(fn($v) => (float)$v)) !!};
        const tdsData = {!! json_encode($chartData->pluck('TDS')->map(fn($v) => (float)$v)) !!};
        const createdAtData = {!! json_encode($chartData->pluck('created_at')) !!};

        // Filter minggu: 7 tanggal unik terakhir
        const uniqueDates = [];
        const uniqueIndices = [];
        for (let i = chartLabels.length - 1; i >= 0; i--) {
            const date = chartLabels[i];
            if (!uniqueDates.includes(date)) {
                uniqueDates.push(date);
                uniqueIndices.push(i);
                if (uniqueDates.length === 7) break;
            }
        }
        uniqueIndices.reverse();

        // Filter hari: data tanggal terakhir, dipisah per jam dari kolom created_at
        const lastDate = createdAtData.length > 0 ? createdAtData[createdAtData.length - 1].slice(0, 10) : null;
        const hourMap = {};
        for (let i = 0; i < createdAtData.length; i++) {
            if (createdAtData[i].slice(0, 10) === lastDate) {
                const hour = createdAtData[i].slice(0, 13); // YYYY-MM-DD HH
                hourMap[hour] = i;
            }
        }
        const sortedHours = Object.keys(hourMap).sort();
        const sortedIndices = sortedHours.map(h => hourMap[h]);

        const chartData = {
            month: {
                labels: chartLabels,
                temperature: suhuData,
                ph: phData,
                tds: tdsData,
            },
            week: {
                labels: uniqueIndices.map(i => chartLabels[i]),
                temperature: uniqueIndices.map(i => suhuData[i]),
                ph: uniqueIndices.map(i => phData[i]),
                tds: uniqueIndices.map(i => tdsData[i]),
            },
            day: {
                labels: sortedHours.map(h => h + ':00'),
                temperature: sortedIndices.map(i => suhuData[i]),
                ph: sortedIndices.map(i => phData[i]),
                tds: sortedIndices.map(i => tdsData[i]),
            }
        };
        let currentTime = 'month';
        const paramColors = {
            temperature: '#7DBB9C',
            ph: '#F59E42',
            tds: '#B29776'
        };
        let mainChart = new Chart(document.getElementById('mainChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: chartData.month.labels,
                datasets: [
                    {
                        type: 'bar',
                        label: 'Temperature',
                        data: chartData.month.temperature,
                        backgroundColor: paramColors.temperature,
                        borderRadius: 6,
                        order: 1,
                        hidden: false
                    },
                    {
                        type: 'bar',
                        label: 'pH',
                        data: chartData.month.ph,
                        backgroundColor: paramColors.ph,
                        borderRadius: 6,
                        order: 1,
                        hidden: false
                    },
                    {
                        type: 'bar',
                        label: 'TDS',
                        data: chartData.month.tds,
                        backgroundColor: paramColors.tds,
                        borderRadius: 6,
                        order: 1,
                        hidden: false
                    }
                ]
            },
            options: {
                animation: { duration: 1200 },
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false } },
                    y: { grid: { color: '#F3F4F6' }, beginAtZero: true }
                }
            }
        });

        // Filter waktu chart
        document.querySelectorAll('.time-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.time-btn').forEach(b => b.classList.remove('bg-[#7DBB9C]', 'text-[#3B240C]', 'active'));
                this.classList.add('bg-[#7DBB9C]', 'text-[#3B240C]', 'active');
                currentTime = this.getAttribute('data-time');
                mainChart.data.labels = chartData[currentTime].labels;
                mainChart.data.datasets[0].data = chartData[currentTime].temperature;
                mainChart.data.datasets[1].data = chartData[currentTime].ph;
                mainChart.data.datasets[2].data = chartData[currentTime].tds;
                mainChart.update();
            });
        });

        // Filter parameter (multi select)
        document.querySelectorAll('.param-btn').forEach((btn, idx) => {
            btn.addEventListener('click', function() {
                this.classList.toggle('active');
                if (this.classList.contains('active')) {
                    if(idx === 0) {
                        this.classList.add('bg-[#7DBB9C]', 'text-[#3B240C]');
                    } else if(idx === 1) {
                        this.classList.add('bg-[#EAF2BB]', 'text-[#3B240C]');
                    } else {
                        this.classList.add('bg-[#B29776]', 'text-[#3B240C]');
                    }
                    mainChart.data.datasets[idx].hidden = false;
                } else {
                    this.classList.remove(
                        'bg-[#7DBB9C]','bg-[#EAF2BB]','bg-[#B29776]',
                        'text-[#3B240C]'
                    );
                    mainChart.data.datasets[idx].hidden = true;
                }
                mainChart.update();
            });
        });
    </script>
</body>
</html>
