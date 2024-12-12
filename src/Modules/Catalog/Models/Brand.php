<?php

namespace Modules\Catalog\Models;

use App\Models\Product;
use App\Traits\Model\HasSlug;
use App\Traits\Model\HasThumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;
    use HasSlug;
    use HasThumbnail;

    protected $fillable = ['title', 'slug', 'thumb', 'featured', 'sorting'];


    public function scopeHomePage($query): void
    {
        $query->where('featured', true)->orderBy('sorting')->limit(6);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getThumbnailDir()
    {
        return 'brands';
    }
}
