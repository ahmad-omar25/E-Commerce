<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::orderBy('id', 'desc')->get();
        return view('dashboard.attributes.index', compact('attributes'));
    }

    public function create() {
        return view('dashboard.attributes.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            Attribute::create($request->all());
            DB::commit();
            toast((__('dashboard.create_successfully')), 'success');
            return redirect()->route('attributes.index');
        } catch (\Exception $exception) {
            DB::rollback();
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('attributes.index');
        }
    }

    public function edit($id) {
        $attribute = Attribute::find($id);
        if (!$attribute) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('attributes.index');
        }
        return view('dashboard.attributes.edit', compact('attribute'));
    }

    public function update($id, Request $request) {
        try {
            $attribute = Attribute::find($id);
            if (!$attribute) {
                toast((__('dashboard.error_message')), 'error');
                return redirect()->route('attributes.index');
            }
            $attribute->update($request->except('_token'));
            toast((__('dashboard.update_successfully')), 'success');
            return redirect()->route('attributes.index');
        } catch (\Exception $ex) {

            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('attributes.index');
        }
    }

    public function destroy($id)
    {
        try {
            $attribute = Attribute::orderBy('id', 'DESC')->find($id);

            if (!$attribute) {
                toast((__('dashboard.error_message')), 'error');
                return redirect()->route('attributes.index');
            }
            $attribute->translations()->delete();
            $attribute->delete();
            toast((__('dashboard.delete_successfully')), 'success');
            return redirect()->route('attributes.index');

        } catch (\Exception $exception) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('attributes.index');
        }
    }
}
