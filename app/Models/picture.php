<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class picture extends Model
{
    use HasFactory;
    protected $fillable = ['path'];
    public function products(): BelongsTo
    {
        return $this->belongsTo(product::class);
    }
}
