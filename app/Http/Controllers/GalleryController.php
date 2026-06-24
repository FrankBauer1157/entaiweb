<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{


    public function index(Request $request)
    {
        $query = Gallery::query();
        $category = $request->get('category', 'all');
        if ($category !== 'all') {
            $query->where('category', $category);
        }
        $galleries = $query->latest()->paginate(12);
        $categories = ['Safari', 'Beaches', 'Culture', 'Wildlife', 'Other'];
        return view('frontend.gallery', compact('galleries', 'categories', 'category'));
    }
}
