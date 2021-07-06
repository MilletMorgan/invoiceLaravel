<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Mission
 * @package App\Models
 * @mixin Eloquent
 */
class Mission extends Model
{
    use HasFactory;
    use HasUuid;

    public $incrementing = false;

    protected $keyType = 'uuid';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'reference',
        'title',
        'comment',
        'deposit',
        'organisation_id',
        'ended_at'
    ];

    /**
     * @return BelongsTo
     */
    public function organisation(): BelongsTo
    {
        return $this->belongsTo(Organisation::class);
    }

    /**
     * @return HasMany
     */
    public function missionLines(): HasMany
    {
        return $this->hasMany(MissionLine::class);
    }

}
