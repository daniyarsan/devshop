<?php

namespace Modules\Catalog\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class CategoryQueryBuilder extends Builder
{
    public function homePage(): CategoryQueryBuilder
    {
        return $this->where('featured', true)->select(['id', 'title', 'slug'])->orderBy('sorting')->limit(6);
    }

}
