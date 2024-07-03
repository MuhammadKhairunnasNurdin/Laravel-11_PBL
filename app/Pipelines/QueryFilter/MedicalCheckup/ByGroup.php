<?php

namespace App\Pipelines\QueryFilter\MedicalCheckup;

use App\Models\MedicalCheckup;
use Illuminate\Database\Eloquent\Builder;

class ByGroup
{
    /**
     * @param Builder $query
     * @param \Closure $next
     * @param string $group
     * @return Builder<MedicalCheckup>
     */
    public function handle(Builder $query, \Closure $next, string $group = ''): Builder
    {
        if (empty($group)) {
            return $next($query);
        }

        return $next($query->where('group', $group));
    }
}
