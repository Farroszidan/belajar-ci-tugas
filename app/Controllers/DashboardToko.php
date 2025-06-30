<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardToko extends Controller
{
    private function getAPIData()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost:8080/api",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "content-type: application/x-www-form-urlencoded",
                "key: mangu12345678abcghi",
            ],
            CURLOPT_TIMEOUT => 10, // batas waktu agar tidak buffering terus
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            curl_close($curl);
            return ['results' => [], 'error' => curl_error($curl)];
        }

        curl_close($curl);
        return json_decode($response, true);
    }

    public function index()
    {
        $apiData = $this->getAPIData();
        $data['penjualan'] = $apiData['results'] ?? [];
        return view('dashboard_toko/index', $data);
    }

    public function cetak()
    {
        $apiData = $this->getAPIData();
        $data['penjualan'] = $apiData['results'] ?? [];
        return view('dashboard_toko/cetak', $data);
    }

    public function api()
    {
        return redirect()->to(base_url('api')); // arahkan ke APIController::index()
    }
}
