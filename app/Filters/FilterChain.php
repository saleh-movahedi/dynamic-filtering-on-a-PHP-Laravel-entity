<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class FilterChain
{
    /**
     * @var array<FilterInterface>
     */
    protected array $filters = [];

    public function addFilter($filter): static
    {
        $this->filters[] = $filter;

        return $this;
    }

    public function apply(Builder $query, $value): Builder
    {
        foreach ($this->filters as $filter) {
            $query = $filter->apply($query, $value);
        }

        return $query;
    }
}
