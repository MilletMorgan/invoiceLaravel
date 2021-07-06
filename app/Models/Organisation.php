<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;
    use HasUuid;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'id',
        'slug',
        'name',
        'email',
        'tel',
        'address',
        'type'
    ];

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }

    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }
}
