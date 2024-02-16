<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SectionCourse;
use App\Models\Section;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //https://github.com/Code-Plank/laravel-inertia-vue3/blob/main/app/Http/Controllers/BlogController.php
    public function index(Request $request)
    {
        $sections = Section::orderBy('name', 'ASC')->paginate(8);
        // dd($courses);
        return Inertia::render('Sections/Index', [
            'sections' => $sections,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        // Suppose que $courses contient une liste de courses à fournir à la vue
        $courses = Course::all();
        return Inertia::render('Sections/Create', [
            'courses' => $courses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        // Validation des données de la requête
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'course' => ['required', 'exists:courses,id'],
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

        $section = Section::create([
            'name' => $request->input('name'),
        ]);


        // Création des associations avec les courses
        $sectionCourse1 = new SectionCourse([
            'section_id' => $section->id,
            'course_id' => $validateData['course'],
        ]);
        $sectionCourse1->save();

        if (isset($validateData['course2'])) {
            $sectionCourse2 = new SectionCourse([
                'section_id' => $section->id,
                'course_id' => $validateData['course2'],
            ]);
            $sectionCourse2->save();
        }

        if (isset($validateData['course3'])) {
            $sectionCourse3 = new SectionCourse([
                'section_id' => $section->id,
                'course_id' => $validateData['course3'],
            ]);
            $sectionCourse3->save();
        }

        if (isset($validateData['course4'])) {
            $sectionCourse4 = new SectionCourse([
                'section_id' => $section->id,
                'course_id' => $validateData['course4'],
            ]);
            $sectionCourse4->save();
        }

        if (isset($validateData['course5'])) {
            $sectionCourse5 = new SectionCourse([
                'section_id' => $section->id,
                'course_id' => $validateData['course5'],
            ]);
            $sectionCourse5->save();
        }

        if (isset($validateData['course6'])) {
            $sectionCourse6 = new SectionCourse([
                'section_id' => $section->id,
                'course_id' => $validateData['course6'],
            ]);
            $sectionCourse6->save();
        }

        if (isset($validateData['course7'])) {
            $sectionCourse7 = new SectionCourse([
                'section_id' => $section->id,
                'course_id' => $validateData['course7'],
            ]);
            $sectionCourse7->save();
        }

        if (isset($validateData['course8'])) {
            $sectionCourse8 = new SectionCourse([
                'section_id' => $section->id,
                'course_id' => $validateData['course8'],
            ]);
            $sectionCourse8->save();
        }

        if (isset($validateData['course9'])) {
            $sectionCourse9 = new SectionCourse([
                'section_id' => $section->id,
                'course_id' => $validateData['course9'],
            ]);
            $sectionCourse9->save();
        }

        if (isset($validateData['course10'])) {
            $sectionCourse10 = new SectionCourse([
                'section_id' => $section->id,
                'course_id' => $validateData['course10'],
            ]);
            $sectionCourse10->save();
        }

        if (isset($validateData['course11'])) {
            $sectionCourse11 = new SectionCourse([
                'section_id' => $section->id,
                'course_id' => $validateData['course11'],
            ]);
            $sectionCourse11->save();
        }

        if (isset($validateData['course12'])) {
            $sectionCourse12 = new SectionCourse([
                'section_id' => $section->id,
                'course_id' => $validateData['course12'],
            ]);
            $sectionCourse12->save();
        }

        // Message flash
        session()->flash('flash.banner', 'La section a été ajoutée!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        // useless
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(Section $section)
    {
        // Récupérez les données de l'étudiant
        $section = Section::find($section->id);
        // Récupérez les courses associées à l'étudiant
        $courses = Course::whereHas('sections', function ($query) use ($section) {
            $query->where('sections.id', $section->id);
        })->get();

        // Récupérez toutes les courses disponibles
        $allCourses = Course::all();

        return Inertia::render('Sections/Edit', [
            'section' => $section,
            'courses' => $courses,
            'allCourses' => $allCourses,
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        // Validation des données de la requête
        $validateData = $request->validate([
            'Name' => ['required', 'string', 'max:255'],
            'course' => ['required', 'exists:courses,id'],
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


        // Mise à jour des champs du modèle Section
        $section->update([
            'name' => $validateData['Name'],
        ]);

        SectionCourse::where(
            'section_id',
            $section->id
        )->delete();


        // Mettre à jour les associations avec les courses
        $sectionCourses = [
            $validateData['course'],
            $validateData['course2'] ?? null,
            $validateData['course3'] ?? null,
            $validateData['course4'] ?? null,
            $validateData['course5'] ?? null,
            $validateData['course6'] ?? null,
            $validateData['course7'] ?? null,
            $validateData['course8'] ?? null,
            $validateData['course9'] ?? null,
            $validateData['course10'] ?? null,
            $validateData['course11'] ?? null,
            $validateData['course12'] ?? null,
        ];

        foreach ($sectionCourses as $index => $courseId) {
            if ($courseId) {
                $sectionCourse = SectionCourse::where('section_id', $section->id)
                    ->where('course_id', $courseId)
                    ->first();

                if ($sectionCourse) {
                    // Mettre à jour l'entrée existante
                    $sectionCourse->update([
                        'section_id' => $section->id,
                        'course_id' => $courseId,
                    ]);
                } else {
                    // Créer une nouvelle entrée
                    $sectionCourse = new SectionCourse([
                        'section_id' => $section->id,
                        'course_id' => $courseId,
                    ]);
                    $sectionCourse->save();
                }
            }
        }

        // Message flash
        session()->flash('flash.banner', 'Les informations de l\'étudiant ont été mises à jour!');

        // Redirige vers la liste des étudiants
        return redirect()->route('sections.index');
    }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();
        session()->flash('flash.banner', 'La section a été détruite!');

        return redirect()->route('sections.index');
        // return Inertia::render('Sections/Delete', [
        //     'section' => $section,
        // ]);
        // return redirect()->route('sections.index');
    }

    public function deletetest(Section $section)
    {
        // $section->delete();
        // session()->flash('flash.banner', 'La section a été détruite!');

        // return redirect()->route('sections.index');
        return Inertia::render('Sections/Delete', [
            'section' => $section,
        ]);
    }
}
