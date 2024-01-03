<?php

namespace App\Filters;

use App\Filters\OrderFilters\AmountFilter;
use App\Filters\OrderFilters\CustomerNationalCodeFilter;
use App\Filters\OrderFilters\OrderStatusFilter;
use Illuminate\Database\Eloquent\Builder;


class OrderFilter
{
    protected FilterChain $filterChain;

    public function __construct()
    {
        $this->filterChain = new FilterChain();
    }


    public function filter(Builder $query, $filters): Builder
    {
        if (isset($filters['status'])) {
            $this->filterChain->addFilter(new OrderStatusFilter());
        }

        if (isset($filters['national_code'])) {
            $this->filterChain->addFilter(new CustomerNationalCodeFilter());
        }

        if (isset($filters['amount'])) {
            $this->filterChain->addFilter(new AmountFilter());
        }

        return $this->filterChain->apply($query, $filters);
    }

}
