<?php

namespace App\Modules\Catalog\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Catalog\Models\Product;
use App\Modules\Catalog\Services\CatalogService;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * @var CatalogService
     */
    private $catalogService;

    public function __construct(CatalogService $catalogService)
    {
        $this->catalogService = $catalogService;
    }

    public function index()
    {
        return redirect()->route('products');
    }

    public function getProducts(Request  $request)
    {
        $category = $request->query('category', null);
        $allCategories = $this->catalogService->getCategories();
        $products = $this->catalogService->getProducts($category);
        $selectedCategory = $this->catalogService->findCategoryBySlug($category);

        return view('catalog.products', [
            'selectedCategory' => $selectedCategory,
            'categories' => $allCategories,
            'products' => $products
        ]);
    }

    public function getProduct(Request  $request, string $slug)
    {
        $product = $this->catalogService->getProductBySlug($slug);
        $allCategories = $this->catalogService->getCategories();

        return view('catalog.product', [
            'categories' => $allCategories,
            'product' => $product
        ]);
    }
}
