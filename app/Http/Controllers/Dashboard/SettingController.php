<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Shipping\Update;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function editShippingMethods($type)
    {
        // Means of Delivery
        if ($type === 'free') {
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();
        } elseif ($type === 'inner') {
            $shippingMethod = Setting::where('key', 'local_label')->first();
        } elseif ($type === 'outer') {
            $shippingMethod = Setting::where('key', 'outer_label')->first();
        } else {
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();
        }
        return view('dashboard.settings.shipping.edit', compact('shippingMethod'));
    }

    public function updateShippingMethods(Update $request, $id) {
        try {
            $shipping = Setting::find($id);
            // Update Plain value
            $shipping->update(['plain_value' => $request->input('plain_value')]);
            // Update Translation
            $shipping->value = $request->input('value');
            $shipping->save();
            toast((__('dashboard.update_successfully')),'success');
            return redirect()->back();
        } catch (\Exception $exception) {
            toast((__('dashboard.error_message')),'error');
            return redirect()->back();
        }

    }
}
