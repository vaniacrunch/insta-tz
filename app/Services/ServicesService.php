<?php

namespace App\Services;

use App\Api\Services\ServicesRequest;

class ServicesService
{
    /**
     * @var ServicesRequest
     */
    private $servicesRequest;

    /**
     * @param ServicesRequest $servicesRequest
     */
    public function __construct(ServicesRequest $servicesRequest)
    {
        $this->servicesRequest = $servicesRequest;
    }

    public function getAvailableServices()
    {
        return $this->servicesRequest->getServices();
    }
}
