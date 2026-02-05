<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'name',
        'description',
        'rating',
        'show_on_site',
    ];

    protected $casts = [
        'show_on_site' => 'boolean',
        'rating' => 'integer',
    ];
}
