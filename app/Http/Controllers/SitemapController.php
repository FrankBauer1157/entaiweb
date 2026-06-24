<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Gallery;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $content = view('sitemap', compact('packages'))->render();
        return Response::make($content, 200, ['Content-Type' => 'application/xml']);
    }
}
