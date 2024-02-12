<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\StudentSection;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::query()->get();

        return Inertia::render('Students/Index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        // Suppose que $sections contient une liste de sections à fournir à la vue
        $sections = Section::all();
        return Inertia::render('Students/Create', [
            'sections' => $sections,
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
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:students'],
            'section' => ['required', 'exists:sections,id'],
            'section2' => ['nullable', 'numeric', 'exists:sections,id'],
            'section3' => ['nullable', 'numeric', 'exists:sections,id'],
        ]);

        $student = Student::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
        ]);

        // Création des associations avec les sections
        $studentSection1 = new StudentSection([
            'student_id' => $student->id,
            'section_id' => $validateData['section'],
        ]);
        $studentSection1->save();

        if (isset($validateData['section2'])) {
            $studentSection2 = new StudentSection([
                'student_id' => $student->id,
                'section_id' => $validateData['section2'],
            ]);
            $studentSection2->save();
        }

        if (isset($validateData['section3'])) {
            $studentSection3 = new StudentSection([
                'student_id' => $student->id,
                'section_id' => $validateData['section3'],
            ]);
            $studentSection3->save();
        }

        // Message flash
        session()->flash('flash.banner', 'La student a été ajoutée!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // useless
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(Student $student)
    {
        // Récupérez les données de l'étudiant
        $student = Student::find($student->id);
        // Récupérez les sections associées à l'étudiant
        $sections = Section::whereHas('students', function ($query) use ($student) {
            $query->where('students.id', $student->id);
        })->get();

        // Récupérez toutes les sections disponibles
        $allSections = Section::all();

        return Inertia::render('Students/Edit', [
            'student' => $student,
            'sections' => $sections,
            'allSections' => $allSections,
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // Validation des données de la requête
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'section' => ['required', 'exists:sections,id'],
            'section2' => ['nullable', 'numeric', 'exists:sections,id'],
            'section3' => ['nullable', 'numeric', 'exists:sections,id'],
        ]);

        // Mise à jour des champs du modèle Student
        $student->update([
            'name' => $validateData['name'],
            'surname' => $validateData['surname'],
            'email' => $validateData['email'],
        ]);

        StudentSection::where(
            'student_id',
            $student->id
        )->delete();


        // Mettre à jour les associations avec les sections
        $studentSections = [
            $validateData['section'],
            $validateData['section2'] ?? null,
            $validateData['section3'] ?? null,
        ];

        foreach ($studentSections as $index => $sectionId) {
            if ($sectionId) {
                $studentSection = StudentSection::where('student_id', $student->id)
                    ->where('section_id', $sectionId)
                    ->first();

                if ($studentSection) {
                    // Mettre à jour l'entrée existante
                    $studentSection->update([
                        'student_id' => $student->id,
                        'section_id' => $sectionId,
                    ]);
                } else {
                    // Créer une nouvelle entrée
                    $studentSection = new StudentSection([
                        'student_id' => $student->id,
                        'section_id' => $sectionId,
                    ]);
                    $studentSection->save();
                }
            }
        }

        // Message flash
        session()->flash('flash.banner', 'Les informations de l\'étudiant ont été mises à jour!');

        // Redirige vers la liste des étudiants
        return redirect()->route('students.index');
    }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        session()->flash('flash.banner', 'La student a été détruite!');

        return redirect()->route('students.index');
        // return Inertia::render('Students/Delete', [
        //     'student' => $student,
        // ]);
        // return redirect()->route('students.index');
    }

    public function deletetest(Student $student)
    {
        // $student->delete();
        // session()->flash('flash.banner', 'La student a été détruite!');

        // return redirect()->route('students.index');
        return Inertia::render('Students/Delete', [
            'student' => $student,
        ]);
    }
}
