<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        $validated['status'] = 'new';
        Inquiry::create($validated);
        return redirect()->route('contact')->with('success', 'Your message has been sent. We will get back to you soon!');
    }

    public function bookNow(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'package' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);
        $packageName = $validated['package'] ?? '';
        $validated['subject'] = 'Booking Request' . ($packageName ? ' - ' . $packageName : '');
        $validated['status'] = 'new';
        Inquiry::create($validated);
        return redirect()->back()->with('success', 'Your booking request has been received. We will contact you shortly!');
    }
}
