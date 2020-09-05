<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SubCategory\Update;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::child()->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.subCategories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::child()->orderBy('id', 'DESC')->get();
        return view('dashboard.subCategories.create', compact('categories'));
    }

    public function store(Update $request) {
        try {

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);
            DB::beginTransaction();
            $category = Category::create($request->except('_token'));
            DB::commit();
            toast((__('dashboard.create_successfully')), 'success');
            return redirect()->route('sub_categories.index');
        } catch (\Exception $ex) {
            DB::rollback();
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('sub_categories.index');
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('sub_categories.index');
        }
        $categories = Category::child()->orderBy('id', 'DESC')->get();
        return view('dashboard.subCategories.edit', compact('category', 'categories'));
    }

    public function update($id, Update $request)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                toast((__('dashboard.error_message')), 'error');
                return redirect()->route('sub_categories.index');
            }
            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);
            $category->update($request->all());
            toast((__('dashboard.update_successfully')), 'success');
            return redirect()->route('sub_categories.index');
        } catch (\Exception $ex) {

            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('sub_categories.index');
        }
    }

    public function destroy($id)
    {

        try {
            //get specific categories and its translations
            $category = Category::orderBy('id', 'DESC')->find($id);

            if (!$category) {
                toast((__('dashboard.error_message')), 'error');
                return redirect()->route('sub_categories.index');
            }
            $category->delete();
            toast((__('dashboard.delete_successfully')), 'success');
            return redirect()->route('sub_categories.index');

        } catch (\Exception $ex) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('sub_categories.index');
        }
    }
}
