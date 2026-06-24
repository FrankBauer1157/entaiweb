<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            ['title' => 'Maasai Mara Sunset', 'image' => 'gallery/placeholder-1.jpg', 'category' => 'Safari', 'is_featured' => true],
            ['title' => 'Lion in the Wild', 'image' => 'gallery/placeholder-2.jpg', 'category' => 'Safari', 'is_featured' => true],
            ['title' => 'Diani Beach Shoreline', 'image' => 'gallery/placeholder-3.jpg', 'category' => 'Beaches', 'is_featured' => true],
            ['title' => 'Coastal Sunrise', 'image' => 'gallery/placeholder-4.jpg', 'category' => 'Beaches', 'is_featured' => true],
            ['title' => 'Maasai Warriors Dance', 'image' => 'gallery/placeholder-5.jpg', 'category' => 'Culture', 'is_featured' => true],
            ['title' => 'Traditional Village Tour', 'image' => 'gallery/placeholder-6.jpg', 'category' => 'Culture', 'is_featured' => false],
            ['title' => 'Elephant Herd at Amboseli', 'image' => 'gallery/placeholder-7.jpg', 'category' => 'Wildlife', 'is_featured' => false],
            ['title' => 'Giraffe Close-Up', 'image' => 'gallery/placeholder-8.jpg', 'category' => 'Wildlife', 'is_featured' => false],
            ['title' => 'Great Migration Panorama', 'image' => 'gallery/placeholder-9.jpg', 'category' => 'Safari', 'is_featured' => false],
            ['title' => 'Mt Longonot Crater View', 'image' => 'gallery/placeholder-10.jpg', 'category' => 'Other', 'is_featured' => false],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
