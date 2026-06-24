<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }
        Testimonial::create($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                \Storage::disk('public')->delete($testimonial->image);
            }
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }
        $testimonial->update($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            \Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted.');
    }
}
