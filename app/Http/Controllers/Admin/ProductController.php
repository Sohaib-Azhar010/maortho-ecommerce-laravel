<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        // Normalize bullet list input into array and store as JSON
        $data['bullet_points'] = $this->normalizeBulletPoints($request);

        // Handle uploads (main image required on create)
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('table_image')) {
            $data['table_image'] = $request->file('table_image')->store('products/table', 'public');
        }

        Product::create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return redirect()->route('admin.products.edit', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $this->validateData($request, $product->id);

        $data['bullet_points'] = $this->normalizeBulletPoints($request);

        // Only replace images if new files are uploaded
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('table_image')) {
            $data['table_image'] = $request->file('table_image')->store('products/table', 'public');
        }

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }

    /**
     * Validate incoming product data.
     */
    protected function validateData(Request $request, ?int $productId = null): array
    {
        $categoryRule = ['nullable', 'exists:categories,id'];

        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category_id' => $categoryRule,
            // On create image is required; on update it is optional
            'image' => [$productId ? 'nullable' : 'required', 'image', 'max:2048'],
            'table_image' => ['nullable', 'image', 'max:2048'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'is_featured' => ['sometimes', 'boolean'],
        ]) + [
            // Checkbox might be missing from the request entirely; force boolean
            'is_featured' => $request->boolean('is_featured'),
        ];
    }

    /**
     * Normalize bullet list input into an array suitable for JSON storage.
     */
    protected function normalizeBulletPoints(Request $request): ?array
    {
        $bullets = $request->input('bullet_points', []);

        if (is_string($bullets)) {
            // Support textarea with newline-separated bullets as a fallback
            $bullets = preg_split('/\r\n|\r|\n/', $bullets) ?: [];
        }

        if (!is_array($bullets)) {
            return null;
        }

        // Trim and remove empty entries
        $normalized = array_values(array_filter(array_map('trim', $bullets), fn ($item) => $item !== ''));

        return $normalized === [] ? null : $normalized;
    }
}
