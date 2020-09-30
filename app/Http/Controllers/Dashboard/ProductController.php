<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\Store;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

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
        // Get Product Active
        if ($request->has('is_active'))
            $request->request->add(['is_active' => 1]);
        else
            $request->request->add(['is_active' => 0]);
        dd($request->all());
        return view('dashboard.products.create');
    }
}
