<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

trait HasUuid
{
    public static function bootHasUuid(): void
    {
        static::creating(function (Model $model) {
            if (empty($model->attributes['id'])) {
                $model->attributes['id'] = (string)Str::orderedUuid();
            }
        });
    }

    public function setIdAttribute(?string $id): void
    {
        if (!$this->exists && is_string($id) && Uuid::isValid($id)) {
            $this->attributes['id'] = $id;
        }
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'uuid';
    }
}
