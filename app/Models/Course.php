<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'instructor_id',
        'description',
        'syllabus',
        'image',
        'price',
    ];

    public function instructor() {
        return $this->belongsTo(User::class);
    }
}
