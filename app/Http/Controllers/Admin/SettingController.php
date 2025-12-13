<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function create()
    {
        if (Setting::query()->exists()) {
            return redirect()->route('admin.settings.edit', Setting::first());
        }
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        if (Setting::query()->exists()) {
            return redirect()->route('admin.settings.edit', Setting::first());
        }
        $data = $this->validateData($request);
        $data = $this->handleUploads($request, $data);
        $data['key'] = 'site';
        Setting::create($data);
        return redirect()->route('admin.settings.index');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $data = $this->validateData($request);
        $data = $this->handleUploads($request, $data, $setting);
        $setting->update($data);
        return redirect()->route('admin.settings.index');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'phone_number' => ['nullable', 'string', 'max:50'],
            'whatsapp_number' => ['nullable', 'string', 'max:50'],
            'instagram_url' => ['nullable', 'url'],
            'snapchat_url' => ['nullable', 'url'],
            'tiktok_url' => ['nullable', 'url'],
            'terms_conditions' => ['nullable', 'string'],
            'privacy_policy' => ['nullable', 'string'],
            'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', 'max:4096'],
            'favicon' => ['nullable', 'image', 'mimes:png,ico', 'max:1024'],
        ]);
    }

    protected function handleUploads(Request $request, array $data, ?Setting $setting = null): array
    {
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('uploads/branding', 'public');
            $data['logo_path'] = '/storage/' . $path;
        } elseif ($setting) {
            $data['logo_path'] = $setting->logo_path;
        }
        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->store('uploads/branding', 'public');
            $data['favicon_path'] = '/storage/' . $path;
        } elseif ($setting) {
            $data['favicon_path'] = $setting->favicon_path;
        }
        return $data;
    }
}
