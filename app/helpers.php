<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting($key, $default = '')
    {
        static $settings = null;
        if ($settings === null) {
            $settings = Setting::pluck('value', 'key')->toArray();
        }
        return $settings[$key] ?? $default;
    }
}
