<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            'company_phone' => 'required|string|max:50',
            'company_address' => 'required|string|max:500',
            'about_text' => 'nullable|string',
            'vision_text' => 'nullable|string',
            'mission_text' => 'nullable|string',
            'value_title_1' => 'nullable|string|max:255',
            'value_desc_1' => 'nullable|string|max:500',
            'value_title_2' => 'nullable|string|max:255',
            'value_desc_2' => 'nullable|string|max:500',
            'value_title_3' => 'nullable|string|max:255',
            'value_desc_3' => 'nullable|string|max:500',
            'value_title_4' => 'nullable|string|max:255',
            'value_desc_4' => 'nullable|string|max:500',
            'value_title_5' => 'nullable|string|max:255',
            'value_desc_5' => 'nullable|string|max:500',
            'facebook_url' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'twitter_url' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|string|max:20',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('logo')) {
            $oldLogo = Setting::where('key', 'logo')->first();
            if ($oldLogo && $oldLogo->value) {
                \Storage::disk('public')->delete($oldLogo->value);
            }
            $validated['logo'] = $request->file('logo')->store('settings', 'public');
        }
        if ($request->hasFile('hero_image')) {
            $oldHero = Setting::where('key', 'hero_image')->first();
            if ($oldHero && $oldHero->value) {
                \Storage::disk('public')->delete($oldHero->value);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('settings', 'public');
        }

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return redirect()->route('admin.settings.index')->with('success', 'Settings updated.');
    }
}
