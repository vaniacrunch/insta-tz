<?php

namespace App\Services;

use App\Api\Services\CreateOrderRequest;
use App\Api\Services\Models\NewOrder;
use App\Api\Services\Models\Order;
use App\Api\Services\OrderStatusRequest;
use App\Helpers\InstagramUrlHelper;
use Illuminate\Support\Collection;

class OrderService
{
    /**
     * @var CreateOrderRequest
     */
    private $createOrderRequest;
    /**
     * @var InstagramUrlHelper
     */
    private $instagramUrlHelper;
    /**
     * @var OrderStatusRequest
     */
    private $orderStatusRequest;

    /**
     * @param CreateOrderRequest $createOrderRequest
     */
    public function __construct(
        CreateOrderRequest $createOrderRequest,
        InstagramUrlHelper $instagramUrlHelper,
        OrderStatusRequest $orderStatusRequest
    )
    {
        $this->createOrderRequest = $createOrderRequest;
        $this->instagramUrlHelper = $instagramUrlHelper;
        $this->orderStatusRequest = $orderStatusRequest;
    }

    /**
     * @param string $igUsername
     * @param string $service
     * @param int $followersAmount
     * @return Order
     */
    public function createOrder(string $igUsername, string $service, int $followersAmount) : \App\Models\Order
    {
        $orderApi = new NewOrder([
            'link' => $this->instagramUrlHelper::prepareUrl($igUsername),
            'quantity' => $followersAmount,
            'service' => $service,
        ]);

        $orderResponse = $this->createOrderRequest->createOrder($orderApi);

        // @todo into repository
        $orderModel =\App\Models\Order::create([
            'ig_username' => $igUsername,
            'order_id' => $orderResponse->order
        ]);

        return $orderModel;
    }

    /**
     * @return Collection
     */
    public function getAllOrders(): Collection
    {
        return \App\Models\Order::all();
    }

    /**
     * @return Collection
     */
    public function findOrderById($id): array
    {
        $orderModel = \App\Models\Order::find($id);
        $orderStatus = $this->orderStatusRequest->getOrderStatus($orderModel->order_id);

        return [
            'model' => $orderModel,
            'status' => $orderStatus
        ];
    }
}
