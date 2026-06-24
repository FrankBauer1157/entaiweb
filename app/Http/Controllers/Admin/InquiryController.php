<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inquiry::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        $inquiries = $query->latest()->paginate(15);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        if ($inquiry->status === 'new') {
            $inquiry->update(['status' => 'read']);
        }
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function markRead(Inquiry $inquiry)
    {
        $inquiry->update(['status' => 'read']);
        return back()->with('success', 'Inquiry marked as read.');
    }

    public function reply(Request $request, Inquiry $inquiry)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);
        Mail::raw($request->reply_message, function ($message) use ($inquiry, $request) {
            $message->to($inquiry->email, $inquiry->name)
                    ->subject('Re: ' . $inquiry->subject)
                    ->from(setting('company_email', 'info@entaikenya.com'), setting('company_name', 'Entai Kenya'));
        });
        $inquiry->update(['status' => 'replied']);
        return back()->with('success', 'Reply sent successfully.');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry deleted.');
    }

    public function export()
    {
        $inquiries = Inquiry::all();
        $filename = 'inquiries_' . date('Y-m-d') . '.csv';
        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, ['ID', 'Name', 'Email', 'Phone', 'Subject', 'Message', 'Status', 'Date']);
        foreach ($inquiries as $i) {
            fputcsv($handle, [$i->id, $i->name, $i->email, $i->phone, $i->subject, $i->message, $i->status, $i->created_at]);
        }
        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);
        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}
