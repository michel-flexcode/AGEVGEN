<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //https://github.com/Code-Plank/laravel-inertia-vue3/blob/main/app/Http/Controllers/BlogController.php
    public function index(Request $request)
    {
        $evaluations = Evaluation::orderBy('id', 'ASC')->paginate(8);
        // dd($evaluations);
        return Inertia::render('Evaluations/Index', [
            'evaluations' => $evaluations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return Inertia::render('Evaluations/Create', [
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
        Evaluation::create([
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
    public function show(Evaluation $evaluation)
    {
        // useless
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //Association de l'id stocké chez evaluations avec l'id des courses
        $courses = Course::whereIn('id', [
            $evaluation->course1,
            $evaluation->course2,
            $evaluation->course3,
            $evaluation->course4,
            $evaluation->course5,
            $evaluation->course6,
            $evaluation->course7,
            $evaluation->course8,
            $evaluation->course9,
            $evaluation->course10,
            $evaluation->course11,
            $evaluation->course12,
        ])->pluck('name', 'id')->toArray();

        $allCourses = Course::all();

        return Inertia::render('Evaluations/Edit', [
            'evaluation' => $evaluation,
            'courses' => $courses,
            'allCourses' => $allCourses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
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
        $evaluation->update([
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

        session()->flash('flash.banner', 'Le evaluation a été modifié!');

        return redirect()->route('evaluations.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        session()->flash('flash.banner', 'La evaluation a été détruite!');

        return redirect()->route('evaluations.index');
        // return Inertia::render('Evaluations/Delete', [
        //     'evaluation' => $evaluation,
        // ]);
        // return redirect()->route('evaluations.index');
    }

    public function deletetest(Evaluation $evaluation)
    {
        // $evaluation->delete();
        // session()->flash('flash.banner', 'La evaluation a été détruite!');

        // return redirect()->route('evaluations.index');
        return Inertia::render('Evaluations/Delete', [
            'evaluation' => $evaluation,
        ]);
    }
}
