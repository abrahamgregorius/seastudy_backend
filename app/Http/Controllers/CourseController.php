<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function popular() {
        $courses = Course::get();
        $courses->map(function($course) {
            return [
                'id' => $course->id,
                'name' => $course->name,
                'slug' => $course->slug,
                'description' => $course->description,
                'syllabus' => $course->syllabus,
                'image' => $course->image,
                'price' => $course->price,
                'instructor' => [
                    'name' => $course->instructor->name,
                    'email' => $course->instructor->email,
                ],
                'created_at' => $course->created_at
            ];
        });

        return response()->json([
            'courses' => $courses
        ]);
    }
}
