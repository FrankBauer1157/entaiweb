<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $query = Package::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }
        $packages = $query->latest()->paginate(9);
        $categories = Package::distinct()->pluck('category')->filter();
        return view('frontend.packages.index', compact('packages', 'categories'));
    }

    public function show($slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();
        $relatedPackages = Package::where('category', $package->category)
            ->where('id', '!=', $package->id)
            ->take(3)
            ->get();
        return view('frontend.packages.show', compact('package', 'relatedPackages'));
    }
}
