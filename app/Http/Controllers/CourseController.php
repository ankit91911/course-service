<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function store(Request $request)
    {

        $course = Course::create($request->all());
        return response()->json([
            'message' => 'Course created successfully!',
            'user' => $course
        ], 201);
    }

    public function index()
    {
        return response()->json(Course::all());
    }

    public function show($id)
    {
        return response()->json(Course::findOrFail($id));
    }
}

