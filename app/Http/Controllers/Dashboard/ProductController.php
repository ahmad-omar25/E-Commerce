<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\Store;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard.products.index');
    }

    public function create()
    {
        $data = [];
        $data['brands'] = Brand::whereIsActive(1)->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::whereIsActive(1)->select('id')->get();

        return view('dashboard.products.create', $data);
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
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'brand_id' => $request->brand_id,
                'is_active' => $request->is_active,
            ]);

            // Save Categories
            $product->categories() -> attach($request->categories);

            // Save Tags
            $product->tags()->attach($request->tags);

            DB::commit();
            toast((__('dashboard.create_successfully')), 'success');
            return redirect()->route('products.create');

        } catch (\Exception $exception) {
          //  return $exception;
            DB::rollback();
            toast((__('dashboard.error_message')), 'error');
            return view('dashboard.products.create');
        }

    }
}
