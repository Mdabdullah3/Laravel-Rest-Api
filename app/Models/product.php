<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'subCategory_id',
        'name',
        'description',
        'quantity',
        'sprice',
        'pprice',
        'discount',
        'size_id',
    ];
    public function size()
    {
        return $this->belongsTo(size::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pictures(): HasMany
    {
        return $this->hasMany(picture::class);
    }
}
