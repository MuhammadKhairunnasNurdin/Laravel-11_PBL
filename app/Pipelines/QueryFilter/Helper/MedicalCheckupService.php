<?php

namespace App\Pipelines\QueryFilter\Helper;

use App\Models\MedicalCheckup;
use Illuminate\Database\Eloquent\Builder;

class MedicalCheckupService extends PipelineAbstract
{

    public function thenReturn(array $filters, Builder $query = null): Builder
    {
        $query = $query ?? MedicalCheckup::query();
        return $this->pipeline
            ->send($query)
            ->through($filters)
            ->thenReturn();
    }
}
