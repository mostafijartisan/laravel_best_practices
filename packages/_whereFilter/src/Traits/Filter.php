<?php

namespace Mostafijartisan\WhereFilter\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Filter
{
    /**
     * Apply filters to the query based on the request.
     */
    public function scopeWhereFilter(Builder $query, array $request): Builder
    {

        dd();

        // Return early if there are no filters or if the request is empty
        // if (empty($this->whereFilters) || empty($request)) {
        //     return $query;
        // }

        foreach ($this->whereFilters as $filter) {

            if($filter['request'] == 'ids'){
                return dd($filter);
            }



            $value = $request[$filter['request']] ?? null;

            // Skip if the request value is not set or empty
            if (empty($value)) {
                continue;
            }

            // Dynamically apply the appropriate query method
            $column = $filter['column'];
            switch ($filter['query']) {
                case 'where':
                    $query->where($column, $value);
                    break;

                case 'whereLike':
                    $query->where($column, 'like', "%{$value}%");
                    break;

                case 'whereIn':
                    $query->whereIn($column, (array) $value);
                    break;

                case 'whereBetween':
                    if (is_array($value) && count($value) === 2) {
                        $query->whereBetween($column, $value);
                    }
                    break;
            }
        }

        return $query;
    }
}
