<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Enumerations\CategoryType;
use App\Http\Requests\Dashboard\MainCategory\Update;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class MainCategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->parent()->paginate(PAGINATION_COUNT);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::select('id', 'parent_id')->get();
        return view('dashboard.categories.create', compact('categories'));
    }

    public function store(Update $request)
    {
        try {

            DB::beginTransaction();
            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            if ($request->type == CategoryType::mainCategory) {
                $request->request->add(['parent_id' => null]);
            }
            Category::create($request->except('_token'));
            DB::commit();
            toast((__('dashboard.create_successfully')), 'success');
            return redirect()->route('main_categories.index');
        } catch (\Exception $exception) {
            DB::rollback();
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('main_categories.index');
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('main_categories.index');
        }
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update($id, Update $request)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                toast((__('dashboard.error_message')), 'error');
                return redirect()->route('main_categories.index');
            }
            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);
            $category->update($request->all());
            toast((__('dashboard.update_successfully')), 'success');
            return redirect()->route('main_categories.index');
        } catch (\Exception $exception) {

            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('main_categories.index');
        }
    }

    public function destroy($id)
    {

        try {
            //get specific categories and its translations
            $category = Category::orderBy('id', 'DESC')->find($id);

            if (!$category) {
                toast((__('dashboard.error_message')), 'error');
                return redirect()->route('main_categories.index');
            }
            $category->translations()->delete();
            $category->delete();
            toast((__('dashboard.delete_successfully')), 'success');
            return redirect()->route('main_categories.index');

        } catch (\Exception $exception) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('main_categories.index');
        }
    }
}
