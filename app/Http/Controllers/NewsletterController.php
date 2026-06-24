<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscriptions,email',
        ]);
        NewsletterSubscription::create(['email' => $request->email]);
        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
