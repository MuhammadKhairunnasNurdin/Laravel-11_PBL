<?php

namespace App\Models;

use App\Enum\MedialCheckup\GroupEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperElderlyMedicalCheckup
 */
class ElderlyMedicalCheckup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'stomach_perimeter',
        'gout',
        'blood_sugar',
        'blood_pressure',
        'cholesterol',
    ];

    /**
     * Eloquent Model Relationships
     */
    public function medical_checkup(): BelongsTo
    {
        return $this->belongsTo(MedicalCheckup::class)->where('group', GroupEnum::ELDERLY->value);
    }
}
