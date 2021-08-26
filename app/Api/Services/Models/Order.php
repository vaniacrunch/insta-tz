<?php

namespace App\Api\Services\Models;

class Order
{
    public $order;
    public $balance;
    public $currency;

    public function __construct(array $data)
    {
        $this->order = $data['order'];
        $this->balance = $data['balance'];
        $this->currency = $data['currency'];
    }
}
