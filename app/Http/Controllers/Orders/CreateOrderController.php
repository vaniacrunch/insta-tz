<?php

namespace App\Http\Controllers\Orders;

use App\Services\OrderService;
use Illuminate\Http\Request;

class CreateOrderController
{
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function __invoke(Request $request)
    {
        $order = $this->orderService->createOrder($request->ig_username, $request->service, $request->followers_amount);

        return redirect()->route('orders.order', $order->id);
    }
}
