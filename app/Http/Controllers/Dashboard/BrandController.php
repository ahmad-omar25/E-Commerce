<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Brand\Store;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('dashboard.brands.index', compact('brands'));
    }

    public function create() {
        return view('dashboard.brands.create');
    }

    public function store(Store $request) {
        try {
            DB::beginTransaction();
            if ($request->has('is_active'))
                $request->request->add(['is_active' => 1]);
            else
                $request->request->add(['is_active' => 0]);

            // Save Logo
            $fileName = '';
            if ($request->has('logo')) {
                $fileName = uploadImage('brands', $request->logo);
            }
            $brand = Brand::create($request->except('_token', 'logo'));
            $brand->logo = $fileName;
            $brand->save();


            DB::commit();
            toast((__('dashboard.create_successfully')), 'success');
            return redirect()->route('brands.index');
        } catch (\Exception $ex) {
            DB::rollback();
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('brands.index');
        }
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('brands.index');
        }
        return view('dashboard.brands.edit', compact('brand'));
    }

    public function update($id, Store $request)
    {
        try {
            $brand = Brand::find($id);
            if (!$brand) {
                toast((__('dashboard.error_message')), 'error');
                return redirect()->route('main_categories.index');
            }

            // DB
            DB::beginTransaction();
            // Save Logo
            if ($request->has('logo')) {
                $fileName = uploadImage('brands', $request->logo);
                Brand::where('id', $id)
                ->update([
                    'logo' => $fileName
                ]);
            }

            if ($request->has('is_active'))

                $request->request->add(['is_active' => 1]);
            else
                $request->request->add(['is_active' => 0]);

            $brand->update($request->except('id', 'logo', '_token'));
            DB::commit();
            toast((__('dashboard.update_successfully')), 'success');
            return redirect()->route('brands.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('brands.index');
        }
    }

    public function destroy($id) {
        $brand = Brand::find($id);
        if (!$brand) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('main_categories.index');
        }
        $brand->translations()->delete();
        $brand->delete();
        toast((__('dashboard.delete_successfully')), 'success');
        return redirect()->route('brands.index');
    }
}
