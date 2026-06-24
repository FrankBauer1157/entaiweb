<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'title' => 'Mt Longonot Day Hike',
                'slug' => 'mt-longonot-day-hike',
                'category' => 'Adventure',
                'description' => 'Conquer the majestic Mt Longonot and enjoy breathtaking views of the Great Rift Valley. This day hike takes you through scenic trails, volcanic craters, and offers an unforgettable outdoor experience perfect for nature enthusiasts and adventure seekers.',
                'duration' => '1 Day',
                'price' => 2200,
                'rating' => 4.8,
                'is_featured' => true,
                'inclusions' => 'Guide fees, Park entry, Transport',
            ],
            [
                'title' => 'Hell\'s Gate Day Trip',
                'slug' => 'hells-gate-day-trip',
                'category' => 'Adventure',
                'description' => 'Explore the stunning Hell\'s Gate National Park with its towering cliffs, gorges, and geothermal features. Cycle through the park, spot wildlife up close, and visit the famous Olkaria Geothermal Spa for a relaxing end to your adventure.',
                'duration' => '1 Day',
                'price' => 3000,
                'rating' => 4.9,
                'is_featured' => true,
                'inclusions' => 'Bike rental, Park fees, Guide, Transport',
            ],
            [
                'title' => 'Camp Dunda Fun Day Edition',
                'slug' => 'camp-dunda-fun-day',
                'category' => 'Camping',
                'description' => 'Experience the ultimate fun day at Camp Dunda with team-building activities, outdoor games, bonfire nights, and scenic camping. Perfect for groups, families, and corporate teams looking for a memorable outdoor getaway.',
                'duration' => '1 Day',
                'price' => 3600,
                'rating' => 4.7,
                'is_featured' => true,
                'inclusions' => 'Camping gear, Meals, Activities, Guide',
            ],
            [
                'title' => 'Maasai Mara Safari',
                'slug' => 'maasai-mara-safari',
                'category' => 'Safari',
                'description' => 'Witness the breathtaking wildlife of the Maasai Mara National Reserve. Experience the Big Five, the Great Migration, and immerse yourself in authentic Maasai culture on this unforgettable 3-day safari adventure.',
                'duration' => '3 Days',
                'price' => 25000,
                'rating' => 4.9,
                'is_featured' => true,
                'inclusions' => 'Accommodation, Park fees, Game drives, Meals, Transport',
            ],
            [
                'title' => 'Diani Beach Escape',
                'slug' => 'diani-beach-escape',
                'category' => 'Beach',
                'description' => 'Escape to the pristine white sands of Diani Beach. Enjoy crystal-clear waters, water sports, luxury beach resorts, and stunning sunsets on this relaxing 3-day coastal getaway.',
                'duration' => '3 Days',
                'price' => 18000,
                'rating' => 4.8,
                'is_featured' => true,
                'inclusions' => 'Accommodation, Meals, Beach activities, Transport',
            ],
            [
                'title' => 'Amboseli National Park',
                'slug' => 'amboseli-national-park',
                'category' => 'Safari',
                'description' => 'Discover Amboseli National Park, famous for its large elephant herds and stunning views of Mount Kilimanjaro. This 2-day safari offers incredible wildlife photography opportunities and cultural encounters.',
                'duration' => '2 Days',
                'price' => 15000,
                'rating' => 4.7,
                'is_featured' => false,
                'inclusions' => 'Accommodation, Park fees, Game drives, Meals, Transport',
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
