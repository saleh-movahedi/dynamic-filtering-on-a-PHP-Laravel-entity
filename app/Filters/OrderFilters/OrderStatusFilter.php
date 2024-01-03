<?php

namespace App\Filters\OrderFilters;

use App\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class OrderStatusFilter implements FilterInterface
{

    public function apply(Builder $query, $data): Builder
    {
        if (!empty($data['status'])) {
            return $query->where('status', $data['status']);
        }

        return $query;
    }
}
