<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Profile\Update;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $admin = Admin::find(auth('admin')->user()->id);
        return view('dashboard.profile.edit', compact('admin'));
    }

    public function update(Update $request)
    {
        try {
            // Find User ID
            $admin = Admin::find(auth('admin')->user()->id);
            // Update Password
            $data = $request->except('password', 'password_confirmation');
            if ($request->has('password') && !is_null($request->password)) {
                $admin['password'] = bcrypt($request->password);
            }
            // Update Admin Profile
            $admin->update($data);
            toast((__('dashboard.update_successfully')), 'success');
            return redirect()->back();
        } catch (\Exception $exception) {
            toast((__('dashboard.error_message')), 'error');
            return redirect()->back();
        }
    }
}
