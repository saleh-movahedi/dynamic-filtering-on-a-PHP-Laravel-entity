<?php

namespace App\Repository;

use App\Filters\OrderFilter;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;

class OrderRepository
{
    private OrderFilter $orderFilter;

    public function __construct(OrderFilter $orderFilter)
    {
        $this->orderFilter = $orderFilter;
    }

    public function getBaseQuery(): Builder
    {
        return Order::query();
    }

    public function getOrdersWithFilter(array $data): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = $this->getBaseQuery();

        $query = $this->orderFilter->filter($query, $data);

        return $query->paginate()->appends($data);
    }

}
