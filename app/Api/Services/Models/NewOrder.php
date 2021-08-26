<?php

namespace App\Api\Services\Models;

class NewOrder
{
    public $link;
    public $quantity;
    public $service;
    public $operation_id;

    /**
     * @param $data
     */
    public function __construct($data)
    {
        $this->link = $data['link'];
        $this->quantity = $data['quantity'];
        $this->service = $data['service'];
        $this->operation_id = $data['operation_id'] ?? uniqid();

    }

    public function toRequest()
    {
        return [
            'link' => $this->link,
            'quantity' => $this->quantity,
            'service' => $this->service,
            'operation_id' => $this->operation_id
        ];
    }
}
