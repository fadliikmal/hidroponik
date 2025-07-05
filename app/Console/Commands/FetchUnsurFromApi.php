<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\unsur;
use Carbon\Carbon; // Tambahkan di atas

class FetchUnsurFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unsur:fetch-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ambil data unsur dari API dan simpan ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('http://127.0.0.1:3000/api/ph');
        if ($response->successful()) {
            $datas = $response->json();

            // Ambil data paling baru saja
            if (is_array($datas) && count($datas) > 0) {
                // Ambil data paling baru (paling depan)
                $latestData = $datas[0];

                $recordDate = isset($latestData['created_at'])
                    ? Carbon::parse($latestData['created_at'])->format('Y-m-d H:i:s')
                    : now();

                $exists = unsur::where('record_date', $recordDate)
                    ->where('pH', $latestData['ph'] ?? null)
                    ->where('suhu', $latestData['temperature'] ?? null)
                    ->where('TDS', $latestData['tds'] ?? null)
                    ->exists();

                if (!$exists) {
                    unsur::create([
                        'record_date' => $recordDate,
                        'pH'          => $latestData['ph'] ?? null,
                        'suhu'        => $latestData['temperature'] ?? null,
                        'TDS'         => $latestData['tds'] ?? null,
                    ]);
                    $this->info('Data baru berhasil ditambahkan.');
                } else {
                    $this->info('Data sudah ada, tidak ditambahkan ulang.');
                }
            } else {
                $this->error('Tidak ada data terbaru dari API');
            }
        } else {
            $this->error('Gagal ambil data API');
        }
    }
}
