<?php

namespace App\Api\Services;

use App\Api\Services\Models\OrderStatus;
use Illuminate\Support\Facades\Http;

class OrderStatusRequest
{
    const URL = 'http://45.147.176.76:8910/v1/just';

    public function getOrderStatus($orderId): ?OrderStatus
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->accept('application/json')->get(self::URL, [
            'order' => $orderId,
            'action' => 'status',
            'key' => '911863916d19759ccc873d427e563f223f0ee099de9b47997784eb9aeb03e06d'
        ])->json();

        if(!$response) {
            // @todo add handler
            return null;
        }
        return new OrderStatus($response);
    }
}
