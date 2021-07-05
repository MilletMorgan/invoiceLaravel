<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'id',
        'price',
        'title',
        'comment',
        'created_at',
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
}
