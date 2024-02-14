<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::query()->get();

        return Inertia::render('Teachers/Index', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Teachers/Create');
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
        ]);

        Teacher::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
        ]);

        session()->flash('flash.banner', 'Un enseignant a été ajoutée!');
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
        return Inertia::render('Teachers/Edit', [
            'teacher' => $teacher,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'], // Changed to string validation
            'email' => ['required', 'email'], // Changed to email validation
        ]);

        $teacher->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'), // Corrected the key to 'mail'
        ]);

        session()->flash('flash.banner', 'Le teacher a été modifié!'); // Corrected the flash message

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
