<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table = 'requirements';
    protected $fillable = ['full_name', 'requirement_type', 'files', 'status'];

    protected $casts = [
        'files' => 'array', // Automatically cast 'files' to an array
    ];
}