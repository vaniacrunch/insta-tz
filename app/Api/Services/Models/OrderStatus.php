<?php

namespace App\Api\Services\Models;

class OrderStatus
{
    public $startCount;
    public $status;
    public $remains;
    public $charge;
    public $currency;

    /**
     * @param $data
     */
    public function __construct($data)
    {
        $this->startCount = $data['start_count'];
        $this->status = $data['status'];
        $this->remains = $data['remains'];
        $this->charge = $data['charge'];
        $this->currency = $data['currency'];
    }
}
