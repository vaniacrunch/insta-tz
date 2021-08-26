<?php

namespace App\Http\Controllers\Orders;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController
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
    public function __invoke(Request $request, $id)
    {
        $order = $this->orderService->findOrderById($id);

        return view('orders.order')
            ->withOrder($order['model'])
            ->withStatus($order['status']);
    }
}
