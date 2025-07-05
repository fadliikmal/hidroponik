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

            if (is_array($datas) && count($datas) > 0) {
                $lastHour = null;
                foreach ($datas as $data) {
                    if (!isset($data['created_at'])) continue;
                    $created = Carbon::parse($data['created_at']);
                    if ($created->lt(Carbon::create(2025, 6, 3))) continue;

                    // Ambil hanya data di menit 0 (tiap jam saja)
                    if ($created->minute !== 0) continue;

                    // Hindari duplikasi jam jika ada lebih dari satu data di jam yang sama
                    $hourKey = $created->format('Y-m-d H');
                    if ($lastHour === $hourKey) continue;
                    $lastHour = $hourKey;

                    $recordDate = $created->format('Y-m-d H:i:s');

                    $exists = unsur::where('record_date', $recordDate)
                        ->where('pH', $data['ph'] ?? null)
                        ->where('suhu', $data['temperature'] ?? null)
                        ->where('TDS', $data['tds'] ?? null)
                        ->exists();

                    if (!$exists) {
                        unsur::create([
                            'record_date' => $recordDate,
                            'pH'          => $data['ph'] ?? null,
                            'suhu'        => $data['temperature'] ?? null,
                            'TDS'         => $data['tds'] ?? null,
                        ]);
                        $this->info('Data pada ' . $recordDate . ' berhasil ditambahkan.');
                    }
                }
                $this->info('Proses import selesai.');
            } else {
                $this->error('Tidak ada data dari API');
            }
        } else {
            $this->error('Gagal ambil data API');
        }
    }
}
