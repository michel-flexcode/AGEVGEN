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
    public function index()
    {
        $sections = Section::query()->get();

        return Inertia::render('Sections/Index', [
            'sections' => $sections
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
        ]);

        $section = Section::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
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
            'name' => ['required', 'string', 'max:255'],
            'course' => ['required', 'exists:courses,id'],
            'course2' => ['nullable', 'numeric', 'exists:courses,id'],
            'course3' => ['nullable', 'numeric', 'exists:courses,id'],
        ]);

        // Mise à jour des champs du modèle Section
        $section->update([
            'name' => $validateData['name'],
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
