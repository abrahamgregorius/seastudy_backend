<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function instructor():BelongsTo {
        return $this->belongsTo(User::class);
    }
}
