<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Show the settings form.
     */
    public function index(): View
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update the settings in the database.
     */
    public function update(Request $request): RedirectResponse
    {
        $data = $request->except(['_token', '_method', 'logo', 'hero_bg']);

        // Validate text settings
        $request->validate(
            collect($data)->mapWithKeys(fn ($v, $k) => [$k => ['nullable', 'string', 'max:500']])->toArray()
        );

        // Validate files
        $request->validate([
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp', 'max:2048'],
            'hero_bg' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        if ($request->hasFile('logo')) {
            // Hapus gambar lama jika ada
            if ($oldLogo = Setting::where('key', 'logo')->value('value')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($oldLogo);
            }
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('hero_bg')) {
            // Hapus gambar lama jika ada
            if ($oldHero = Setting::where('key', 'hero_bg')->value('value')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($oldHero);
            }
            $data['hero_bg'] = $request->file('hero_bg')->store('settings', 'public');
        }

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Clear the settings cache so it reloads immediately
        Cache::forget('app_settings');

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings successfully updated.');
    }
}
