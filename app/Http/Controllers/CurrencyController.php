<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    // Method untuk ambil semua exchange rates
    public function index()
    {
        $apiKey = config('app.exchange_api_key');
        $apiUrl = config('app.exchange_api_url');

        // Request ke API menggunakan Laravel HTTP Client
        $response = Http::get("{$apiUrl}/{$apiKey}/latest/USD");

        // Cek apakah request berhasil
        if ($response->successful()) {
            $data = $response->json();
            return view('currency.index', compact('data'));
        }

        // Kalau gagal, tampilkan error
        return back()->with('error', 'Gagal mengambil data dari API');
    }

    // Method untuk konversi mata uang
    public function convert(Request $request)
    {
        $apiKey = config('app.exchange_api_key');
        $apiUrl = config('app.exchange_api_url');

        $from = $request->input('from', 'USD');
        $to = $request->input('to', 'IDR');
        $amount = $request->input('amount', 1);

        // Request ke API
        $response = Http::get("{$apiUrl}/{$apiKey}/latest/{$from}");

        if ($response->successful()) {
            $data = $response->json();
            $rate = $data['conversion_rates'][$to];
            $result = $amount * $rate;

            return view('currency.convert', compact('from', 'to', 'amount', 'result', 'rate'));
        }

        return back()->with('error', 'Gagal melakukan konversi');
    }
}
