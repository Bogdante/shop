<?php

namespace App\Modules\Catalog\Services;

use App\Modules\Catalog\Models\Category;
use App\Modules\Catalog\Models\Product;

class CatalogService
{
    private const DEFAULT_PAGINATION = 6;

    public function getCategories()
    {
        return Category::all();
    }

    public function getProducts(?string $categorySlug)
    {
        if ($categorySlug === null) {
            return Product::paginate(self::DEFAULT_PAGINATION);
        }

        $category = Category::getBySlug($categorySlug);
        return $category->products()->paginate(self::DEFAULT_PAGINATION);
    }

    public function getProductBySlug(string $slug)
    {
        return Product::getBySlug($slug);
    }

}
