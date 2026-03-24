<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
class ProductController extends Controller 
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $categoryId = $request->input('category_id');

        $query = Product::with('category')
            ->where('is_delete', false);

        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('sku', 'like', '%' . $keyword . '%');
            });
        }

        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        $products = $query->orderBy('id', 'desc')->get();
        $categories = Category::where('is_delete', false)->orderBy('name')->get();

        return view('admin.product.index', [
            'products' => $products,
            'categories' => $categories,
            'keyword' => $keyword,
            'categoryId' => $categoryId,
        ]);
    }

    public function get(string $id = "123")
    {
        return view("product.detail", ['id' => $id]);
    }

    public function create() {
        $categories = Category::where('is_delete', false)->orderBy('name')->get();

        return view('admin.product.add', ['categories' => $categories]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => [
                'nullable',
                'integer',
                Rule::exists('categories', 'id')->where(fn ($query) => $query->where('is_delete', false)),
            ],
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|gt:0|lte:price',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        Product::create([
            'category_id' => $validated['category_id'] ?? null,
            'name' => $validated['name'],
            'sku' => $validated['sku'] ?? null,
            'price' => $validated['price'],
            'sale_price' => $validated['sale_price'] ?? null,
            'stock' => $validated['stock'],
            'description' => $validated['description'] ?? null,
            'image' => $validated['image'] ?? null,
            'is_active' => $request->boolean('is_active', true),
            'is_delete' => false,
        ]);

        return redirect('/products');
    }

    // public function edit(string $id)
    // {
    //     $product = Product::find($id);
    //     return view('product.edit', ['product' => $product]);
    // }

    public function edit(string $id)
    {
        $product = Product::where('is_delete', false)->findOrFail($id);
        $categories = Category::where('is_delete', false)->orderBy('name')->get();

        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }
 public function update(Request $request, string $id): RedirectResponse
    {
        $product = Product::where('is_delete', false)->findOrFail($id);

        $validated = $request->validate([
            'category_id' => [
                'nullable',
                'integer',
                Rule::exists('categories', 'id')->where(fn ($query) => $query->where('is_delete', false)),
            ],
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|gt:0|lte:price',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $product->update([
            'category_id' => $validated['category_id'] ?? null,
            'name' => $validated['name'],
            'sku' => $validated['sku'] ?? null,
            'price' => $validated['price'],
            'sale_price' => $validated['sale_price'] ?? null,
            'stock' => $validated['stock'],
            'description' => $validated['description'] ?? null,
            'image' => $validated['image'] ?? null,
            'is_active' => $request->boolean('is_active', false),
        ]);

        return redirect('/products');
    }

    // public function update(Request $request, string $id)
    // {
    //     $product = Product::find($id);
    //     $product->name = $request->name;
    //     $product->stock = $request->stock;

    //     $product->save();
    //     return redirect('/product');
    // }

        public function delete(string $id)
    {
        $product = Product::find($id);
        $product -> delete();
        return redirect('/products');
    }

    public function register()
    {
        return view("register");
    }

    public function registerRequest(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:6|confirmed',
        ]);

        return response()->json([
            'message' => 'Dang ky thanh cong',
            'data' => [
                'username' => $request->username,
            ]
        ]);
    }

        public function loginDone() {
        return view ('products.logindone');
    }

    // public static function middleware ()
    // {
    //     return [
    //         CheckTimeAccess::class,
    //     ];
    // }

    public function age(){
        return view ('product.age');
    }

    public function checkAge(Request $request)
    {
        session([
            'age_verified' => true,
            'age' => $request->age
        ]);
        return redirect('/product');
    }
}
