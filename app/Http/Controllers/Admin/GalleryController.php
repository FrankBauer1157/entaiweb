<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::query();
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }
        $galleries = $query->latest()->paginate(12);
        $categories = ['Safari', 'Beaches', 'Culture', 'Wildlife', 'Other'];
        return view('admin.galleries.index', compact('galleries', 'categories'));
    }

    public function create()
    {
        $categories = ['Safari', 'Beaches', 'Culture', 'Wildlife', 'Other'];
        return view('admin.galleries.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'category' => 'required|in:Safari,Beaches,Culture,Wildlife,Other',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('gallery', 'public');
                Gallery::create([
                    'image' => $path,
                    'category' => $request->category,
                    'is_featured' => false,
                ]);
            }
        }
        return redirect()->route('admin.galleries.index')->with('success', 'Images uploaded.');
    }

    public function edit(Gallery $gallery)
    {
        $categories = ['Safari', 'Beaches', 'Culture', 'Wildlife', 'Other'];
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'category' => 'required|in:Safari,Beaches,Culture,Wildlife,Other',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                \Storage::disk('public')->delete($gallery->image);
            }
            $validated['image'] = $request->file('image')->store('gallery', 'public');
        }
        $validated['is_featured'] = $request->has('is_featured');
        $gallery->update($validated);
        return redirect()->route('admin.galleries.index')->with('success', 'Image updated.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            \Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Image deleted.');
    }
}
