<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'duration',
        'price',
        'image',
        'rating',
        'inclusions',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'price' => 'decimal:2',
            'rating' => 'decimal:1',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($package) {
            if (empty($package->slug)) {
                $package->slug = Str::slug($package->title);
            }
        });

        static::updating(function ($package) {
            if ($package->isDirty('title') && !$package->isDirty('slug')) {
                $package->slug = Str::slug($package->title);
            }
        });
    }
}
