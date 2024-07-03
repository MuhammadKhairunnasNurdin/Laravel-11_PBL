<?php

namespace App\Pipelines\QueryFilter\Civilian;

use App\Models\Civilian;
use Illuminate\Database\Eloquent\Builder;

class ById
{

    /**
     * @param Builder $query
     * @param \Closure $next
     * @param int ...$id
     * @return Builder<Civilian>
     */
    public function handle(Builder $query, \Closure $next, int ...$id): Builder
    {
        if (collect($id)->isEmpty()) {
            return $next($query);
        }

        return $next($query->whereIn('id', $id));
    }
}
