<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

trait ConsumeApiUsers
{
    protected function getApiClient()
    {
        $token = session('api_token');

        if (!$token) {
            Log::error("Token no encontrado en sesión.");
            abort(401, 'No autorizado: Token no disponible.');
        }

        return new Client([
            'base_uri' => 'https://tec.atura.mx/api/v1/',
            'verify'   => base_path('cacert.pem'),
            'headers'  => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
    }

    protected function getApiUsers()
    {
        try {
            $client = $this->getApiClient();
            $response = $client->get('users');
            $body = json_decode($response->getBody()->getContents(), true);
            Log::alert($body);
            return $body['data'] ?? [];
        } catch (\Exception $e) {
            Log::error("Error al obtener usuarios: ", ['exception' => $e]);
            abort(500, 'No se pudo obtener la lista de usuarios desde la API.');
        }
    }

    protected function getApiUser($id)
    {
        try {
            $client = $this->getApiClient();
            $response = $client->get("users/{$id}");
            $body = json_decode($response->getBody()->getContents(), true);
            return $body['data'] ?? [];
        } catch (\Exception $e) {
            Log::error("Error al obtener usuario {$id}: " . $e->getMessage());
            abort(500, 'No se pudo obtener el usuario desde la API.');
        }
    }

    protected function postApiUser(array $data)
    {
        try {
            $client = $this->getApiClient();
            $response = $client->post("users", ['json' => $data]);
            $body = json_decode($response->getBody()->getContents(), true);
            Log::alert($body);
            return $body['data'] ?? [];
        } catch (\Exception $e) {
            Log::error("Error al crear usuario: " . $e->getMessage());
            abort(500, 'No se pudo crear el usuario en la API.');
        }
    }

    protected function patchApiUser($id, array $data)
    {
        try {
            $client = $this->getApiClient();
            $response = $client->patch("users/{$id}", ['json' => $data]);
            $body = json_decode($response->getBody()->getContents(), true);
            return $body['data'] ?? [];
        } catch (\Exception $e) {
            Log::error("Error al actualizar usuario {$id}: " . $e->getMessage());
            abort(500, 'No se pudo actualizar el usuario en la API.');
        }
    }

    protected function deleteApiUser($id)
    {
        try {
            $client = $this->getApiClient();
            $response = $client->delete("users/{$id}");
            $body = json_decode($response->getBody()->getContents(), true);
            return $body['data'] ?? [];
        } catch (\Exception $e) {
            Log::error("Error al eliminar usuario {$id}: " . $e->getMessage());
            abort(500, 'No se pudo eliminar el usuario desde la API.');
        }
    }
}
