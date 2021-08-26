<?php

namespace App\Services;

use App\Api\Instagram\InstagramUserRequest;
use App\Helpers\InstagramUrlHelper;

class InstagramUserService
{
    /**
     * @var InstagramUserRequest
     */
    private $instagramUserRequest;

    /**
     * @var InstagramUrlHelper
     */

    public function __construct(InstagramUserRequest $instagramUserRequest)
    {

        $this->instagramUserRequest = $instagramUserRequest;
    }

    /**
     * @param string $url
     */
    public function findInstagramUser(string $url)
    {
        return $this->instagramUserRequest->getInstagramUserProfile($url);
    }
}
