<?php

namespace App\Api\Services;

use App\Api\Services\Models\Service;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ServicesRequest
{
    /**
     *
     */
    const URL = 'http://45.147.176.76:8910/v1/just?action=services&key=911863916d19759ccc873d427e563f223f0ee099de9b47997784eb9aeb03e06d';

    /**
     * @return Collection|null
     */
    public function getServices() : ?Collection
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->accept('application/json')->get(self::URL)->json();

        if(!$response) {
            // @todo add handler
            return null;
        }

        $collection = collect();
        foreach ($response as $service) {
            $serv = new Service($service);
            $collection->push($serv);
        }

        return $collection;
    }
}
