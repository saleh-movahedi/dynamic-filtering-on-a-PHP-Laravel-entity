<?php

namespace App\Http\Controllers;

use App\Http\Requests\indexOrderRequest;
use App\Services\OrderService;
use Exception;

class OrderController extends Controller
{

    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     * @throws Exception
     */
    public function index(indexOrderRequest $request)
    {
        $result = $this->orderService->getOrdersWithFilter(data: $request->validated());

        return response()->json($result);
    }
}
