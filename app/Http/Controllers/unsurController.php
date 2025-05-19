<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\unsur;

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
        $latest = unsur::orderBy('record_date', 'desc')->first();
        $chartData = unsur::orderBy('record_date', 'asc')->get();

        // Tampilkan ke halaman sensor
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
}
