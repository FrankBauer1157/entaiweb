<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $query = Package::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }
        if ($request->filled('is_featured')) {
            $query->where('is_featured', $request->is_featured === '1');
        }
        $packages = $query->latest()->paginate(10);
        $categories = Package::distinct()->pluck('category')->filter();
        return view('admin.packages.index', compact('packages', 'categories'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'duration' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'inclusions' => 'nullable|string',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('packages', 'public');
        }
        $validated['is_featured'] = $request->has('is_featured');

        Package::create($validated);
        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'duration' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'inclusions' => 'nullable|string',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($package->image) {
                \Storage::disk('public')->delete($package->image);
            }
            $validated['image'] = $request->file('image')->store('packages', 'public');
        }
        $validated['is_featured'] = $request->has('is_featured');

        $package->update($validated);
        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        if ($package->image) {
            \Storage::disk('public')->delete($package->image);
        }
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }
}
