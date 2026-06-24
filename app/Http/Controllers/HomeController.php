<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $packages = Package::where('is_featured', true)->latest()->take(6)->get();
        $testimonials = Testimonial::where('status', 'published')->latest()->get();
        $galleryImages = Gallery::where('is_featured', true)->latest()->take(8)->get();
        $settings = Setting::pluck('value', 'key')->toArray();
        $coreValues = collect(range(1, 5))->map(function ($i) use ($settings) {
            return [
                'title' => $settings["core_value_{$i}_title"] ?? '',
                'description' => $settings["core_value_{$i}_desc"] ?? '',
            ];
        })->filter(fn($v) => !empty($v['title']));
        return view('frontend.home', compact('packages', 'testimonials', 'galleryImages', 'settings', 'coreValues'));
    }
}
