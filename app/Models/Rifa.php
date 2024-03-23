<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\RifaStatusTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rifa extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => RifaStatusTypeEnum::class
    ];

    public function categoriaRifa(): BelongsTo
    {
        return $this->belongsTo(CategoriaRifa::class);
    }
}
