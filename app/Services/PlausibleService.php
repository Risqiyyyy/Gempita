<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class PlausibleService
{
    protected $baseUrl;
    protected $site;
    protected $apiKey;

    public function __construct()
    {
        $this->site = config('services.plausible.site');
        $this->apiKey = config('services.plausible.api_key');
        $this->baseUrl = rtrim(config('services.plausible.base_url'), '/') . '/api/v1';
    }

    public function getStats($period, $property)
    {
        $response = Http::withToken($this->apiKey)
            ->get("{$this->baseUrl}/stats/breakdown", [
                'site_id' => $this->site,
                'period' => $period,
                'property' => $property,
            ]);

        if ($response->successful()) {
            return $response->json();
        }

        return ['error' => 'Gagal mengambil data dari Plausible', 'debug' => $response->body()];
    }

    public function getMet($period, $metrics)
    {
        $response = Http::withToken($this->apiKey)
            ->get("{$this->baseUrl}/stats/aggregate", [
                'site_id' => $this->site,
                'period' => $period,
                'metrics' => $metrics,
            ]);

        if ($response->successful()) {
            return $response->json();
        }

        return ['error' => 'Gagal mengambil data dari Plausible', 'debug' => $response->body()];
    }


    public function getTimeSeries($period, $metrics)
    {
        $response = Http::withToken($this->apiKey)
            ->get("{$this->baseUrl}/stats/timeseries", [
                'site_id' => $this->site,
                'period' => $period,
                'metrics' => $metrics,
            ]);
    
        if ($response->successful()) {
            return $response->json();
        }
    
        return ['error' => 'Gagal mengambil data dari Plausible', 'debug' => $response->body()];
    }
    

}

