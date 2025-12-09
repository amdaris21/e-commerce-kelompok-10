<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    private function getSellerStoreId()
    {
        return 1;
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function index()
    {
        $storeId = $this->getSellerStoreId();
        $products = Product::where('store_id', $storeId)->with('category', 'images')->paginate(10);

        return view('seller.product.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::pluck('name', 'id');
        return view('seller.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'product_category_id' => 'required|exists:product_categories,id',
            'about' => 'required|string',
            'price' => 'required|numeric|min:100',
            'stock' => 'required|integer|min:0',
            'condition' => 'required|in:new,used',
            'weight' => 'required|integer|min:1',
            'images' => 'required|array|min:1|max:5',
            'images.*' => 'image|max:2048',
        ]);

        $storeId = $this->getSellerStoreId();

        $product = Product::create([
            'store_id' => $storeId,
            'product_category_id' => $validated['product_category_id'],
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'about' => $validated['about'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'condition' => $validated['condition'],
            'weight' => $validated['weight'],
        ]);

        foreach ($request->file('images') as $key => $imageFile) {
            $path = $imageFile->store('products', 'public');
            $product->images()->create([
                'image' => 'storage/' . $path,
                'is_thumbnail' => ($key === 0),
            ]);
        }

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil dibuat!');
    }

    public function show(Product $product)
    {
        if ($product->store_id != $this->getSellerStoreId()) {
            abort(403);
        }
        return view('seller.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        if ($product->store_id != $this->getSellerStoreId()) {
            abort(403);
        }
        $categories = ProductCategory::pluck('name', 'id');
        return view('seller.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->store_id != $this->getSellerStoreId()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'product_category_id' => 'required|exists:product_categories,id',
            'about' => 'required|string',
            'price' => 'required|numeric|min:100',
            'stock' => 'required|integer|min:0',
            'condition' => 'required|in:new,used',
            'weight' => 'required|integer|min:1',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $product->update([
            'product_category_id' => $validated['product_category_id'],
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'about' => $validated['about'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'condition' => $validated['condition'],
            'weight' => $validated['weight'],
        ]);

        if ($request->hasFile('images')) {
            $product->images()->delete();
            foreach ($request->file('images') as $key => $imageFile) {
                $path = $imageFile->store('products', 'public');
                $product->images()->create([
                    'image' => 'storage/' . $path,
                    'is_thumbnail' => ($key === 0),
                ]);
            }
        }

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->store_id != $this->getSellerStoreId()) {
            abort(403);
        }

        foreach ($product->images as $image) {
            Storage::disk('public')->delete(str_replace('storage/', '', $image->image));
        }

        $product->images()->delete();
        $product->delete();

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
