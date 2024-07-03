<?php

namespace App\Models;

use App\Enum\MedialCheckup\GroupEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperBabyMedicalCheckup
 */
class BabyMedicalCheckup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'head_perimeter',
        'arm_perimeter',
        'asi',
        'group_category',
    ];

    /**
     * Eloquent Model Relationships
     */
    public function medical_checkup(): BelongsTo
    {
        return $this->belongsTo(MedicalCheckup::class)->where('group',GroupEnum::BABY->value);
    }
}
