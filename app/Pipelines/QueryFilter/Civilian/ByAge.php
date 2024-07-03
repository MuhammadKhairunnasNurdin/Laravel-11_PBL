<?php

namespace App\Pipelines\QueryFilter\Civilian;

use App\Models\Civilian;
use Illuminate\Database\Eloquent\Builder;

class ByAge
{
    /**
     * @param Builder<Civilian> $query
     * @param \Closure $next
     * @param string|null $operator
     * @param int $age
     * @return Builder<Civilian>
     */
    public function handle(Builder $query, \Closure $next, string $operator = null, int $age = 0): Builder
    {
        if (empty($operator) && empty($age)){
            return $next($query);
        }

        if (!in_array($operator, ['<', '<=', '>', '>=', '='])) {
            return $next($query);
        }

        return $next($query->where('date_of_birth', $operator, now()->subYears($age)->format('Y-m-d')));
    }
}
