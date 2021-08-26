<?php

namespace App\Http\Controllers\UserSearch;

use App\Services\InstagramUserService;
use App\Services\ServicesService;
use Illuminate\Http\Request;

class FindController
{
    /**
     * @var InstagramUserService
     */
    private $instagramUserService;
    /**
     * @var ServicesService
     */
    private $servicesService;

    /**
     * @param InstagramUserService $instagramUserService
     */
    public function __construct(InstagramUserService $instagramUserService, ServicesService $servicesService)
    {
        $this->instagramUserService = $instagramUserService;
        $this->servicesService = $servicesService;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $user = $this->instagramUserService->findInstagramUser($request->instagram_url);
        $services = $this->servicesService->getAvailableServices();
        return view('user_search.index')
            ->withUser($user)
            ->withServices($services);
    }

}
