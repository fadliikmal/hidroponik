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

            foreach ($datas as $data) {
                $recordDate = isset($data['created_at'])
                    ? Carbon::parse($data['created_at'])->format('Y-m-d H:i:s')
                    : now();

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
                        'TDS'        => $data['tds'] ?? null,
                    ]);
                    $this->info('Data baru berhasil ditambahkan.');
                } else {
                    $this->info('Data sudah ada, tidak ditambahkan ulang.');
                }
            }
        } else {
            $this->error('Gagal ambil data API');
        }
    }
}
