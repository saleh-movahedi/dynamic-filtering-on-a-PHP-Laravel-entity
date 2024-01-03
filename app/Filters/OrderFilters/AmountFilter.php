<?php

namespace App\Filters\OrderFilters;

use App\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class AmountFilter implements FilterInterface
{
    public function apply(Builder $query, $data): Builder
    {
        if (!empty($data['amount_min'])) {
            $query->where('amount', '>=', $data['amount_min']);
        }

        if (!empty($data['amount_max'])) {
            $query->where('amount', '<=', $data['amount_max']);
        }

        return $query;
    }
}
