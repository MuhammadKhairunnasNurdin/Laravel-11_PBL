<?php

namespace App\Pipelines\QueryFilter\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class ByRole
{
    /**
     * @param Builder<User> $query
     * @param \Closure $next
     * @param string $role
     * @return Builder<User>
     */
    public function handle(Builder $query, \Closure $next, string $role = ''): Builder
    {
        if (empty($role)) {
            return $next($query);
        }

        return $next($query->where('role', $role));
    }
}
