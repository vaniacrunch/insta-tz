<?php

namespace App\Api\Services\Models;

class Service
{
    public $service;
    public $name;
    public $type;
    public $category;
    public $rate;
    public $min;
    public $max;
    public $dripfeed;
    public $average_time;

    /**
     * @param $data
     */
    public function __construct($data)
    {
        $this->service = $data['service'];
        $this->name = $data['name'];
        $this->type = $data['type'];
        $this->category = $data['category'];
        $this->rate = $data['rate'];
        $this->min = $data['min'];
        $this->max = $data['max'];
        $this->dripfeed = $data['dripfeed'];
        $this->average_time = $data['average_time'];

    }
}
