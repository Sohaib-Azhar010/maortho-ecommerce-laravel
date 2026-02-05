<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)
            ->orderByDesc('id')
            ->take(6)
            ->get();

        return view('home', compact('featuredProducts'));
    }

    public function store(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $productsQuery = Product::with('category')->orderByDesc('id');

        $activeCategory = null;
        if ($request->filled('category')) {
            $activeCategory = $categories->firstWhere('id', (int) $request->input('category'));

            if ($activeCategory) {
                $productsQuery->where('category_id', $activeCategory->id);
            }
        }

        $products = $productsQuery->paginate(12)->withQueryString();

        return view('store', [
            'products' => $products,
            'categories' => $categories,
            'activeCategory' => $activeCategory,
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function product(Product $product)
    {
        $product->load('category');

        $relatedProducts = Product::where('id', '!=', $product->id)
            ->where('category_id', $product->category_id)
            ->take(3)
            ->get();

        return view('product-show', compact('product', 'relatedProducts'));
    }
}
