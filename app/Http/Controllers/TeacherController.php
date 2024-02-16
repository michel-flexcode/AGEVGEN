<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $teachers = Teacher::query()->get();

    //     return Inertia::render('Teachers/Index', [
    //         'teachers' => $teachers
    //     ]);
    // }

    //https://github.com/Code-Plank/laravel-inertia-vue3/blob/main/app/Http/Controllers/BlogController.php
    public function index(Request $request)
    {
        $teachers = Teacher::orderBy('name', 'ASC')->paginate(8);
        // dd($teachers);
        return Inertia::render('Teachers/Index', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return Inertia::render('Teachers/Create', [
            'courses' => $courses,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'course1' => ['required', 'numeric', 'exists:courses,id'],
            'course2' => ['nullable', 'numeric', 'exists:courses,id'],
            'course3' => ['nullable', 'numeric', 'exists:courses,id'],
            'course4' => ['nullable', 'numeric', 'exists:courses,id'],
            'course5' => ['nullable', 'numeric', 'exists:courses,id'],
            'course6' => ['nullable', 'numeric', 'exists:courses,id'],
            'course7' => ['nullable', 'numeric', 'exists:courses,id'],
            'course8' => ['nullable', 'numeric', 'exists:courses,id'],
            'course9' => ['nullable', 'numeric', 'exists:courses,id'],
            'course10' => ['nullable', 'numeric', 'exists:courses,id'],
            'course11' => ['nullable', 'numeric', 'exists:courses,id'],
            'course12' => ['nullable', 'numeric', 'exists:courses,id'],
        ]);
        // dd($request);
        Teacher::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'course1' => $request->input('course1'),
            'course2' => $request->input('course2'),
            'course3' => $request->input('course3'),
            'course4' => $request->input('course4'),
            'course5' => $request->input('course5'),
            'course6' => $request->input('course6'),
            'course7' => $request->input('course7'),
            'course8' => $request->input('course8'),
            'course9' => $request->input('course9'),
            'course10' => $request->input('course10'),
            'course11' => $request->input('course11'),
            'course12' => $request->input('course12'),
        ]);

        session()->flash('flash.banner', 'Un enseignant a été ajouté!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        // useless
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //Association de l'id stocké chez teachers avec l'id des courses
        $courses = Course::whereIn('id', [
            $teacher->course1,
            $teacher->course2,
            $teacher->course3,
            $teacher->course4,
            $teacher->course5,
            $teacher->course6,
            $teacher->course7,
            $teacher->course8,
            $teacher->course9,
            $teacher->course10,
            $teacher->course11,
            $teacher->course12,
        ])->pluck('name', 'id')->toArray();

        $allCourses = Course::all();

        return Inertia::render('Teachers/Edit', [
            'teacher' => $teacher,
            'courses' => $courses,
            'allCourses' => $allCourses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            // Ajouter ici les règles de validation pour les cours multiples
            'course' => ['nullable', 'integer'],
            'course1' => ['nullable', 'integer'],
            'course2' => ['nullable', 'integer'],
            'course3' => ['nullable', 'integer'],
            'course4' => ['nullable', 'integer'],
            'course5' => ['nullable', 'integer'],
            'course6' => ['nullable', 'integer'],
            'course7' => ['nullable', 'integer'],
            'course8' => ['nullable', 'integer'],
            'course9' => ['nullable', 'integer'],
            'course10' => ['nullable', 'integer'],
            'course11' => ['nullable', 'integer'],
            'course12' => ['nullable', 'integer'],
        ]);

        // Mettre à jour les informations de l'enseignant
        $teacher->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            // Mettre à jour les cours multiples
            'course' => $request->input('course'),
            'course1' => $request->input('course1'),
            'course2' => $request->input('course2'),
            'course3' => $request->input('course3'),
            'course4' => $request->input('course4'),
            'course5' => $request->input('course5'),
            'course6' => $request->input('course6'),
            'course7' => $request->input('course7'),
            'course8' => $request->input('course8'),
            'course9' => $request->input('course9'),
            'course10' => $request->input('course10'),
            'course11' => $request->input('course11'),
            'course12' => $request->input('course12'),
        ]);

        session()->flash('flash.banner', 'Le teacher a été modifié!');

        return redirect()->route('teachers.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        session()->flash('flash.banner', 'La teacher a été détruite!');

        return redirect()->route('teachers.index');
        // return Inertia::render('Teachers/Delete', [
        //     'teacher' => $teacher,
        // ]);
        // return redirect()->route('teachers.index');
    }

    public function deletetest(Teacher $teacher)
    {
        // $teacher->delete();
        // session()->flash('flash.banner', 'La teacher a été détruite!');

        // return redirect()->route('teachers.index');
        return Inertia::render('Teachers/Delete', [
            'teacher' => $teacher,
        ]);
    }
}
