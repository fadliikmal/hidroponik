<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\unsur;
use Illuminate\Support\Facades\Http; // Tambahkan di atas
use Carbon\Carbon; // Tambahkan di atas

class unsurController extends Controller
{
    // Tampilkan data terbaru untuk dashboard atau card parameter
    public function index()
    {
        $latest = unsur::orderBy('record_date', 'desc')->first();
        $chartData = unsur::orderBy('record_date', 'asc')->get();

        // Tampilkan ke halaman utama (misal dashboard/parameter)
        return view('Parameter', [
            'latest' => $latest,
            'chartData' => $chartData
        ]);
    }

    public function suhu()
    {
        $latest = unsur::orderBy('record_date', 'desc')->first();
        $chartData = unsur::orderBy('record_date', 'asc')->get();

        // Tampilkan ke halaman suhu
        return view('suhutailwind', [
            'latest' => $latest,
            'chartData' => $chartData
        ]);
    }

    public function sensor()
    {
        // Ambil data paling terbaru saja
        $latest = unsur::latest('record_date')->first();
        
        // Ambil semua data untuk chart, terurut dari lama ke baru
        $chartData = unsur::orderBy('record_date', 'asc')->get();

        return view('sensor', [
            'latest' => $latest,
            'chartData' => $chartData
        ]);
    }

    // Jika ingin detail per tanggal
    public function detail($id)
    {
        $data = unsur::findOrFail($id);
        return view('suhutailwind', compact('data'));
    }

    public function fetchAndStoreFromApi()
    {
        // Ambil data dari API
        $response = Http::get('https://iot.labfit.id/api/ph');
        if ($response->successful()) {
            $data = $response->json();

            // Contoh struktur data dari API, sesuaikan jika berbeda
            // Misal: ['ph' => 7.1, 'tds' => 500, 'suhu' => 27.5, 'record_date' => '2024-05-20']
            unsur::create([
                'record_date' => $data['created_at'] ?? now()->toDateString(),
                'pH'         => $data['ph'] ?? null,
                'TDS'        => $data['tds'] ?? null,
                'suhu'       => $data['temperature'] ?? null,
            ]);

            return response()->json(['status' => 'success', 'data' => $data]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Gagal ambil data API'], 500);
        }
    }
    public function fetchAllFromApi()
    {
        $response = Http::withOptions(['verify' => false])->get('https://iot.labfit.id/api/ph');
        if ($response->successful()) {
            $datas = $response->json();

            // Jika $datas adalah array data
            foreach ($datas as $data) {
                // Konversi ISO 8601 ke format MySQL
                $recordDate = isset($data['created_at'])
                    ? Carbon::parse($data['created_at'])->format('Y-m-d H:i:s')
                    : now();

                $exists = unsur::where('record_date', $recordDate)
                    ->where('pH', $data['ph'] ?? null)
                    ->where('TDS', $data['tds'] ?? null)
                    ->where('suhu', $data['temperature'] ?? null)
                    ->exists();

                if (!$exists) {
                    unsur::create([
                        'record_date' => $recordDate,
                        'pH'         => $data['ph'] ?? null,
                        'TDS'        => $data['tds'] ?? null,
                        'suhu'       => $data['temperature'] ?? null,
                    ]);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Semua data berhasil disimpan']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Gagal ambil data API'], 500);
        }
    }
}
