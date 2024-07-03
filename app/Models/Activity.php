<?php

namespace App\Models;

use App\Enum\User\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperActivity
 */
class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'date_of_activity',
        'start_time',
        'place',
    ];

    /**
     * Eloquent Model Relationships
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->where('role', RoleEnum::MEMBER->value);
    }
}
