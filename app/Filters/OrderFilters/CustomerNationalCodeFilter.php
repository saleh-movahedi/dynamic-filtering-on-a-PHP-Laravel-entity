<?php

namespace App\Filters\OrderFilters;

use App\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class CustomerNationalCodeFilter implements FilterInterface
{

    public function apply(Builder $query, $data): Builder
    {
        if (!empty($data['national_code'])) {
            return $query->whereHas('customer', function ($customerQuery) use ($data) {
                $customerQuery->where('national_code', $data['national_code']);
            });
        }

        return $query;
    }

}
