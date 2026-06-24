<?php

namespace Database\Seeders;

use App\Models\Inquiry;
use Illuminate\Database\Seeder;

class InquirySeeder extends Seeder
{
    public function run(): void
    {
        $inquiries = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '+254 711 111111',
                'subject' => 'Safari Package Inquiry',
                'message' => 'I\'m interested in the Maasai Mara Safari for a group of 4 people in August. Please send me more details about availability and pricing.',
                'status' => 'new',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '+254 722 222222',
                'subject' => 'Beach Holiday Booking',
                'message' => 'Looking to book the Diani Beach Escape for my family of 5 for the December holidays. Do you have any special family packages?',
                'status' => 'read',
            ],
            [
                'name' => 'Mike Brown',
                'email' => 'mike@example.com',
                'phone' => '+254 733 333333',
                'subject' => 'Corporate Retreat',
                'message' => 'Our company is planning a corporate retreat for 20 people. We need team-building activities and accommodation. Can you send a proposal?',
                'status' => 'replied',
            ],
            [
                'name' => 'Lisa Anderson',
                'email' => 'lisa@example.com',
                'phone' => '+1 555 123 4567',
                'subject' => 'Visa Assistance Needed',
                'message' => 'I\'m planning to visit Kenya from the US and need help with the visa process and travel insurance. Can you assist?',
                'status' => 'new',
            ],
            [
                'name' => 'Peter Otieno',
                'email' => 'peter@example.com',
                'phone' => '+254 744 444444',
                'subject' => 'Mt Longonot Hike',
                'message' => 'I\'d like to join the Mt Longonot Day Hike this weekend. Is there availability for 2 people?',
                'status' => 'read',
            ],
        ];

        foreach ($inquiries as $inquiry) {
            Inquiry::create($inquiry);
        }
    }
}
