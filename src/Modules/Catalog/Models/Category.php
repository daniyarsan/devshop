<?php

namespace Modules\Catalog\Models;

use App\Models\Product;
use App\Traits\Model\HasSlug;
use Modules\Catalog\QueryBuilders\CategoryQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @method static Category | CategoryQueryBuilder query()
 */
class Category extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['title', 'featured', 'sorting'];

    public function newEloquentBuilder($query): CategoryQueryBuilder
    {
        return new CategoryQueryBuilder($query);
    }

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
