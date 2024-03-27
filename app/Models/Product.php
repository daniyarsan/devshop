<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['title', 'slug', 'thumb', 'price', 'brand_id'];


    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
