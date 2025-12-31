<?php

namespace App\View\Components\Backend\Admin;

use App\Models\Gallery;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TinymceConfig extends Component
{
    public $imageList;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->imageList = Gallery::latest()->get()->map(function($image) {
            return [
                'title' => (string) ($image->title ?? $image->id), 
                'value' => asset($image->image_path), 
            ];
        })->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.admin.tinymce-config');
    }
}
