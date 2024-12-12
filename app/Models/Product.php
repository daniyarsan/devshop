<?php

namespace App\Models;

use App\Casts\PriceCast;
use App\Traits\Model\HasSlug;
use App\Traits\Model\HasThumbnail;
use Modules\Catalog\Models\Brand;
use Modules\Catalog\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Catalog\QueryBuilders\ProductQueryBuilder;

class Product extends Model
{
    use HasFactory;
    use HasSlug;
    use HasThumbnail;

    protected $fillable = ['title', 'slug', 'thumb', 'price', 'brand_id', 'featured', 'sorting'];

    protected $casts = [
        'price' => PriceCast::class
    ];

    public function newEloquentBuilder($query): ProductQueryBuilder
    {
        return new ProductQueryBuilder($query);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function getThumbnailDir(): string
    {
        return 'products';
    }
}
