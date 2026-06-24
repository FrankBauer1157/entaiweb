<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Inquiry;
use App\Models\Testimonial;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPackages = Package::count();
        $totalInquiries = Inquiry::count();
        $totalTestimonials = Testimonial::count();
        $totalGalleries = Gallery::count();
        $recentInquiries = Inquiry::latest()->take(5)->get();
        return view('admin.dashboard', compact('totalPackages', 'totalInquiries', 'totalTestimonials', 'totalGalleries', 'recentInquiries'));
    }
}
