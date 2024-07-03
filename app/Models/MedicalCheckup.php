<?php

namespace App\Models;

use App\Enum\User\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperMedicalCheckup
 */
class MedicalCheckup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'civilian_id',
        'checkup_date',
        'group',
        'weight',
        'height',
        'status',
    ];

    /**
     * Eloquent Model Relationships
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->where('role', RoleEnum::MEMBER->value);
    }

    public function baby_medical_checkup(): HasOne
    {
        return $this->hasOne(BabyMedicalCheckup::class);
    }

    public function elderly_medical_checkup(): HasOne
    {
        return $this->hasOne(ElderlyMedicalCheckup::class);
    }

    public function civilian(): BelongsTo
    {
        return $this->belongsTo(Civilian::class);
    }
}
