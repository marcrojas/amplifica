<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class AmplificaClient
{
    private string $baseUrl;
    private string $username;
    private string $password;

    public function __construct()
    {
        $this->baseUrl  = env('AMPLIFICA_BASE_URL', 'https://postulaciones.amplifica.io');
        $this->username = env('AMPLIFICA_USERNAME');
        $this->password = env('AMPLIFICA_PASSWORD');
    }

    private function tokenCacheKey(): string
    {
        return 'amplifica_token';
    }

    private function fetchToken(): string
    {
        $response = Http::withoutVerifying()
            ->baseUrl($this->baseUrl)
            ->asJson()
            ->post('/auth', [
                'username' => $this->username,
                'password' => $this->password,
            ]);

        if ($response->failed()) {
            throw new \Exception('Error al obtener token: ' . $response->body());
        }

        $token = $response->json('token');

        // Guardamos el token 50 segundos (porque dura 1 minuto)
        Cache::put($this->tokenCacheKey(), $token, now()->addSeconds(50));

        return $token;
    }

    private function getToken(): string
    {
        return Cache::remember($this->tokenCacheKey(), 50, function () {
            return $this->fetchToken();
        });
    }

    private function requestWithAuth(string $method, string $uri, array $data = [])
    {
        $token = $this->getToken();

        $doRequest = function ($token) use ($method, $uri, $data) {
            return Http::withoutVerifying()
                ->baseUrl($this->baseUrl)
                ->withToken($token)
                ->acceptJson()
                ->{strtolower($method)}($uri, $data);
        };

        $response = $doRequest($token);

        if ($response->status() === 401) {
            $token = $this->fetchToken();
            $response = $doRequest($token);
        }

        if ($response->failed()) {
            throw new \Exception('Error en la API externa: ' . $response->body());
        }

        return $response;
    }


    public function regionalConfig(): array
    {
        return $this->requestWithAuth('GET', '/regionalConfig')->json();
    }

    public function getRate(string $comuna, array $products): array
    {
        $payload = [
            'comuna'   => $comuna,
            'products' => $products,
        ];

        return $this->requestWithAuth('POST', '/getRate', $payload)->json();
    }
}
