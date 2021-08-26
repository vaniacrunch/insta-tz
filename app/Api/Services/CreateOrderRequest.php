<?php

namespace App\Api\Services;

use App\Api\Services\Models\NewOrder;
use App\Api\Services\Models\Order;
use Illuminate\Support\Facades\Http;

class CreateOrderRequest
{
    const URL = 'http://45.147.176.76:8910/v1/just/add?action=add&key=911863916d19759ccc873d427e563f223f0ee099de9b47997784eb9aeb03e06d';

    public function createOrder(NewOrder $order)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->accept('application/json')->post(self::URL, $order->toRequest())->json();

        if(!$response) {
            // @todo add handler
            return null;
        }

        return new Order($response);
    }
}
