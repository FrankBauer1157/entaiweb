<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'location',
        'testimonial',
        'rating',
        'image',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
        ];
    }
}
