<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('dashboard.auth.login');
    }

    public function adminLogin(Login $request)
    {
        try {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                toast((__('dashboard.login_successfully')),'success');
                return redirect()->route('admin.dashboard');
            }
            toast((__('dashboard.error_data')),'error');
            return redirect()->route('admin.login')->withInput($request->only('email'));
        } catch (\Exception $exception) {
            toast((__('dashboard.error_message')),'error');
            return redirect()->route('admin.login');
        }
    }

    public function logout() {
        auth()->guard('admin')->logout();
        toast((__('dashboard.logout_successfully')),'success');
        return redirect()->route('admin.login');
    }
}
