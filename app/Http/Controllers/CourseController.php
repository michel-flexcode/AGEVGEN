<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //https://github.com/Code-Plank/laravel-inertia-vue3/blob/main/app/Http/Controllers/BlogController.php
    public function index(Request $request)
    {
        $courses = Course::orderBy('name', 'ASC')->paginate(8);
        // dd($courses);
        return Inertia::render('Courses/Index', [
            'courses' => $courses,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Courses/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        Course::create([
            'name' => $request->input('name'),
        ]);

        session()->flash('flash.banner', 'La course a été ajoutée!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        // useless
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return Inertia::render('Courses/Edit', [
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        $course->update([
            'name' => $request->input('name'),
        ]);

        session()->flash('flash.banner', 'Le course a été modifié!'); // Corrected the flash message

        return redirect()->route('courses.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        session()->flash('flash.banner', 'La course a été détruite!');

        return redirect()->route('courses.index');
        // return Inertia::render('Courses/Delete', [
        //     'course' => $course,
        // ]);
        // return redirect()->route('courses.index');
    }

    public function deletetest(Course $course)
    {
        // $course->delete();
        // session()->flash('flash.banner', 'La course a été détruite!');

        // return redirect()->route('courses.index');
        return Inertia::render('Courses/Delete', [
            'course' => $course,
        ]);
    }
}
