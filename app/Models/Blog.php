<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',    // Added title to the fillable property
        'author',
        'summary',
        'category',
        'content',
        'tags',
    ];
}
