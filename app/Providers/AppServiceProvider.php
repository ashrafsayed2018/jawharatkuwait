<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Str::macro('arabicSlug', function (string $value): string {
            $value = trim($value);
            if (preg_match('/\p{Arabic}/u', $value)) {
                $slug = preg_replace('/\s+/u', '-', $value);
                $slug = preg_replace('/[^\p{Arabic}\p{N}\-]+/u', '', $slug);
                return trim($slug, '-');
            }
            return Str::slug($value);
        });
        View::share('siteSettings', Cache::remember('site_settings', 300, fn() => Setting::first()));
    }
}
