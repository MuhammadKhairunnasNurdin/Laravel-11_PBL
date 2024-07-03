<?php

namespace App\Pipelines\QueryFilter\Helper;

use App\Models\Civilian;
use Illuminate\Database\Eloquent\Builder;

class CivilianService extends PipelineAbstract
{

    public function thenReturn(array $filters, Builder $query = null): Builder
    {
        $query = $query ?? Civilian::query();
        return $this->pipeline
            ->send($query)
            ->through($filters)
            ->thenReturn();
    }
}
