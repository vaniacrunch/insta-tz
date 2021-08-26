<?php

namespace App\Http\Controllers\Orders;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrdersController
{
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * @param OrderService $orderService
     */
    public function __construct(
        OrderService $orderService
    )
    {
        $this->orderService = $orderService;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
       $orders = $this->orderService->getAllOrders();

       return view('orders.list')->withOrders($orders);

    }
}
