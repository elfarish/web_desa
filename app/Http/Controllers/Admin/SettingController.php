<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->settings as $id => $value) {
            $setting = Setting::find($id);
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings berhasil diperbarui.');
    }
}
