<?php

namespace App\Pipelines\QueryFilter\Civilian;

use App\Models\Civilian;
use Illuminate\Database\Eloquent\Builder;

class BetweenAge
{
    /**
     * @param Builder $query
     * @param \Closure $next
     * @param int $oldAge
     * @param int $newerAge
     * @return Builder<Civilian>
     */
    public function handle(Builder $query, \Closure $next, int $oldAge = 0, int $newerAge = 0): Builder
    {
        if (empty($oldAge) || empty($newerAge)) {
            return $next($query);
        }

        return $next($query->whereBetween('date_of_birth', [
            now()->subYears($oldAge)->format('Y-m-d'),
            now()->subYears($newerAge)->format('Y-m-d')]
        ));
    }
}
