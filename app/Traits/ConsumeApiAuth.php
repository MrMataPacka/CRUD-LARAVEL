<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

trait ConsumeApiAuth
{
    protected function getBearerToken($apiEmail, $apiPassword)
    {
        try {
            $client = new Client([
                'base_uri' => 'https://tec.atura.mx/api/v1/',
                'verify' => base_path('cacert.pem'),
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $response = $client->post('login', [
                'form_params' => [
                    'email'    => $apiEmail,
                    'password' => $apiPassword,
                ],
            ]);

            $body = json_decode($response->getBody()->getContents(), true);
            return [
                'token' => $body['token']['token'] ?? null,
                'uid'   => $body['user']['uid'] ?? null,
            ];

        } catch (\Exception $e) {
            Log::error("Error al autenticar con la API: " . $e->getMessage());
            abort(500, 'Credenciales Invalidas.');
        }
    }
}
