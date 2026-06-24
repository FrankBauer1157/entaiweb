<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Sarah M.',
                'location' => 'Nairobi, Kenya',
                'testimonial' => 'Entai Kenya made our Maasai Mara trip absolutely magical! The guides were knowledgeable, the accommodations were superb, and every detail was handled perfectly. Highly recommended!',
                'rating' => 5,
                'status' => 'published',
            ],
            [
                'client_name' => 'James K.',
                'location' => 'London, UK',
                'testimonial' => 'Our first African safari exceeded all expectations thanks to Entai Kenya. From airport pickup to the final game drive, the service was impeccable. Will definitely book again!',
                'rating' => 5,
                'status' => 'published',
            ],
            [
                'client_name' => 'Amina W.',
                'location' => 'Mombasa, Kenya',
                'testimonial' => 'The Diani Beach escape was exactly what we needed. Perfect blend of relaxation and adventure. Entai Kenya\'s team was professional and responsive throughout.',
                'rating' => 4,
                'status' => 'published',
            ],
            [
                'client_name' => 'David T.',
                'location' => 'New York, USA',
                'testimonial' => 'I was nervous about traveling to Africa for the first time, but Entai Kenya made everything seamless. The cultural experiences and wildlife encounters were life-changing.',
                'rating' => 5,
                'status' => 'published',
            ],
            [
                'client_name' => 'Grace O.',
                'location' => 'Kampala, Uganda',
                'testimonial' => 'Camp Dunda was the best team-building experience we\'ve ever had! The activities were well organized and the staff was incredibly friendly. Looking forward to our next trip!',
                'rating' => 4,
                'status' => 'published',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
