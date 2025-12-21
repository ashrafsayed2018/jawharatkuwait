<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Cache::remember('services_index', 300, fn() => Service::where('is_active', true)->latest()->paginate(12));
        return view('services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::with('galleries')->where('slug', $slug)->where('is_active', true)->first();
        if (!$service) {
            $fallbackServices = \App\Helpers\ServiceHelper::getFallbackServices();
            $fallbackService = collect($fallbackServices)->first(function ($item) use ($slug) {
                return Str::arabicSlug($item['title']) === $slug;
            });

            if ($fallbackService) {
                $service = new Service([
                    'title' => $fallbackService['title'],
                    'slug' => $slug,
                    'short_description' => $fallbackService['short_description'],
                    'long_description' => $fallbackService['long_description'],
                    'image' => asset($fallbackService['image']),
                    'meta_title' => $fallbackService['meta_title'],
                    'meta_description' => $fallbackService['meta_description'],
                    'is_active' => true,
                ]);
            } else {
                $title = str_replace('-', ' ', $slug);
                $service = new Service([
                    'title' => $title,
                    'slug' => $slug,
                    'short_description' => 'خدمات ضيافة وتأجير وتجهيز مناسبات',
                    'long_description' => 'تفاصيل الخدمة سيتم تحديثها لاحقاً. لخدمتك الآن يمكنك التواصل عبر واتساب.',
                    'image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=1200&auto=format&fit=crop',
                    'meta_title' => $title,
                    'meta_description' => 'خدمات جوهرة الكويت - ' . $title,
                    'is_active' => true,
                ]);
            }
        }
        $relatedPosts = \App\Models\Post::where(function ($q) use ($service) {
            $q->where('tags', 'like', '%'.$service->slug.'%')
              ->orWhere('tags', 'like', '%'.$service->title.'%');
        })->latest()->take(6)->get();
        return view('services.show', [
            'service' => $service,
            'relatedPosts' => $relatedPosts,
            'metaTitle' => $service->meta_title,
            'metaDescription' => $service->meta_description,
        ]);
    }

    public function fromTitle($title)
    {
        $slug = Str::arabicSlug($title);
        return redirect()->route('services.show', $slug);
    }
}
