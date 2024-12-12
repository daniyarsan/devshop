<?php

namespace Modules\Catalog\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use Modules\Catalog\Models\Category;
use Plugins\Trait\Makable;

class ProductQueryBuilder extends Builder
{
    public function homePage(): ProductQueryBuilder
    {
        return $this->where('featured', true)->orderBy('sorting')->limit(6);
    }

    public function catalogPage(Category $category): ProductQueryBuilder
    {
        $builder = $this->when($category->exists, function(Builder $q) use ($category) {
            $q->whereRelation('categories', 'categories.id', '=', $category->id);
        });

        foreach (filters() as $filter) {
            $builder = $filter->apply($builder);
        }

        return $builder;
    }


}
