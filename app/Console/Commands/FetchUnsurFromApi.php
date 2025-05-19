<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\unsur;

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
        $response = Http::get('https://iot.labfit.id/api/ph');
        if ($response->successful()) {
            $data = $response->json();

            // Cek apakah data sudah ada (misal berdasarkan created_at atau nilai unik lain)
            $exists = unsur::where('record_date', $data['created_at'] ?? now()->toDateString())
                ->where('pH', $data['ph'] ?? null)
                ->where('TDS', $data['tds'] ?? null)
                ->where('suhu', $data['suhu'] ?? null)
                ->exists();

            if (!$exists) {
                unsur::create([
                    'record_date' => $data['created_at'] ?? now()->toDateString(),
                    'pH'         => $data['ph'] ?? null,
                    'TDS'        => $data['tds'] ?? null,
                    'suhu'       => $data['suhu'] ?? null,
                ]);
                $this->info('Data baru berhasil ditambahkan.');
            } else {
                $this->info('Data sudah ada, tidak ditambahkan ulang.');
            }
        } else {
            $this->error('Gagal ambil data API');
        }
    }
}
