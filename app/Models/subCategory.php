<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class subCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
}
