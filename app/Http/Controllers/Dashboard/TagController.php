<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('dashboard.tags.index', compact('tags'));
    }

    public function create() {
        return view('dashboard.tags.create');
    }

    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            $tags = Tag::create($request->except('_token'));
            DB::commit();
            toast((__('dashboard.create_successfully')), 'success');
            return redirect()->route('tags.index');
        } catch (\Exception $exception) {
            DB::rollback();
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('tags.index');
        }
    }

    public function edit($id) {
        $tag = Tag::find($id);

        if (!$tag) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('tags.index');
        }

        return view('dashboard.tags.edit', compact('tag'));
    }

    public function update($id, Request $request) {
        try {
            $tag = Tag::find($id);
            if (!$tag) {
                toast((__('dashboard.error_message')), 'error');
                return redirect()->route('tags.index');
            }
            $tag->update($request->except('_token'));
            toast((__('dashboard.update_successfully')), 'success');
            return redirect()->route('tags.index');
        } catch (\Exception $ex) {

            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('tags.index');
        }
    }

    public function destroy($id)
    {

        try {
            $tag = Tag::orderBy('id', 'DESC')->find($id);

            if (!$tag) {
                toast((__('dashboard.error_message')), 'error');
                return redirect()->route('tags.index');
            }
            $tag->translations()->delete();
            $tag->delete();
            toast((__('dashboard.delete_successfully')), 'success');
            return redirect()->route('tags.index');

        } catch (\Exception $exception) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->route('tags.index');
        }
    }
}
