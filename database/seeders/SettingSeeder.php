<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'company_name', 'value' => 'Entai Kenya'],
            ['key' => 'company_email', 'value' => 'info@entaikenya.com'],
            ['key' => 'company_phone', 'value' => '+254 700 000000'],
            ['key' => 'company_address', 'value' => 'Nairobi, Kenya'],
            ['key' => 'company_about', 'value' => 'Entai Kenya is a premier travel and logistics company based in Nairobi, Kenya. We specialize in creating unforgettable African experiences through our expertly curated safari packages, cultural tours, beach holidays, and corporate travel solutions. Our team of dedicated professionals brings years of local expertise to ensure every journey is seamless, safe, and extraordinary.'],
            ['key' => 'company_vision', 'value' => 'To be Africa\'s leading travel and logistics partner, connecting the world to the continent\'s most extraordinary experiences through innovation, sustainability, and authentic hospitality.'],
            ['key' => 'company_mission', 'value' => 'To deliver exceptional travel and logistics solutions that exceed expectations, foster cultural understanding, and create lasting memories for every client we serve.'],
            ['key' => 'core_value_1_title', 'value' => 'Customer-Centricity'],
            ['key' => 'core_value_1_desc', 'value' => 'Your satisfaction is our priority in every interaction'],
            ['key' => 'core_value_2_title', 'value' => 'Integrity'],
            ['key' => 'core_value_2_desc', 'value' => 'Honest, transparent, and ethical in all our dealings'],
            ['key' => 'core_value_3_title', 'value' => 'Innovation'],
            ['key' => 'core_value_3_desc', 'value' => 'Constantly evolving to serve you better'],
            ['key' => 'core_value_4_title', 'value' => 'Sustainability'],
            ['key' => 'core_value_4_desc', 'value' => 'Committed to responsible and eco-conscious travel'],
            ['key' => 'core_value_5_title', 'value' => 'Excellence'],
            ['key' => 'core_value_5_desc', 'value' => 'Delivering premium quality in every detail'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/entaikenya'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/entaikenya'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/entaikenya'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com/@entaikenya'],
            ['key' => 'whatsapp_number', 'value' => '+254700000000'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
