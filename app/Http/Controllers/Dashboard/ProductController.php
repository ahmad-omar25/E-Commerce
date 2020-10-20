<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\Price;
use App\Http\Requests\Dashboard\Product\Stock;
use App\Http\Requests\Dashboard\Product\Store;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories', 'brand', 'tags')->get();
        return view('dashboard.products.general.index', compact('products'));
    }

    public function create()
    {
        $data = [];
        $data['brands'] = Brand::whereIsActive(1)->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::whereIsActive(1)->select('id')->get();

        return view('dashboard.products.general.create', $data);
    }

    public function store(Store $request)
    {
        try {
            DB::beginTransaction();

            // Get Product Active
            if ($request->has('is_active'))
                $request->request->add(['is_active' => 1]);
            else
                $request->request->add(['is_active' => 0]);
            $product = Product::create([
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'short_description' => $request->input('short_description'),
                'brand_id' => $request->input('brand_id'),
                'is_active' => $request->input('is_active'),
            ]);

            // Save Categories
            $product->categories()->attach($request->input('categories'));

            // Save Tags
            $product->tags()->attach($request->input('tags'));

            DB::commit();
            toast((__('dashboard.create_successfully')), 'success');
            return redirect()->route('products.index');

        } catch (\Exception $exception) {
            DB::rollback();
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('products.index');
        }

    }

    // Get Product Price
    public function getPrice($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('dashboard.products.prices.create', compact('product'));
    }

    // Store Product Price
    public function storePrice(Price $request)
    {
        try {
            Product::whereId($request->product_id)->update($request->except('_token', 'product_id'));
            toast((__('dashboard.update_successfully')), 'success');
            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('products.index');
        }
    }

    // Get Product Stock
    public function getStock($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('dashboard.products.stock.create', compact('product'));
    }

    // Store Product Stock
    public function storeStock(Stock $request)
    {
        try {
            Product::whereId($request->product_id)->update($request->except('_token', 'product_id'));
            toast((__('dashboard.update_successfully')), 'success');
            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('products.index');
        }
    }
}
