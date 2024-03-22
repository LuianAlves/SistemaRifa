<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CategoriaRifa extends Model
{
    use HasFactory;

    public function rifa (): HasOne
    {
        return $this->hasOne(Rifa::class);
    }
}