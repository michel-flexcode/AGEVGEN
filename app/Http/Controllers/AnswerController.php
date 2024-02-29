<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Formulaire;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function index($formulaireId)
    // {
    //     // Récupérer le formulaire spécifique par son ID avec ses questions
    //     $formulaire = Formulaire::findOrFail($formulaireId);
    //     // Charger les questions liées à ce formulaire
    //     $questions = Question::whereIn('id', $formulaire->getAttributes())->orderBy('label', 'ASC')->get();
    //     // Retourner la vue avec les questions du formulaire
    //     return Inertia::render('Answers/Index', [
    //         'questions' => $questions,
    //     ]);
    // }

    // public function index($formulaireId)
    // {
    //     // Récupérer le formulaire spécifique par son ID avec ses questions
    //     $formulaire = Formulaire::findOrFail($formulaireId);

    //     // Initialiser un tableau pour stocker les ID des questions du formulaire
    //     $questionIds = [];

    //     // Boucler sur toutes les colonnes de la table 'formulaires' pour récupérer les ID des questions
    //     for ($i = 1; $i <= 50; $i++) {
    //         $columnName = 'question' . $i;
    //         $questionId = $formulaire->$columnName;
    //         if ($questionId !== null) {
    //             $questionIds[] = $questionId;
    //         }
    //     }

    //     // Charger les questions liées à ces ID
    //     $questions = Question::whereIn('id', $questionIds)->orderBy('label', 'ASC')->get();

    //     // Retourner la vue avec les questions du formulaire
    //     return Inertia::render('Answers/Index', [
    //         'questions' => $questions,
    //     ]);
    // }

    // public function index($formulaireId)

    public function index()
    {
        // // Récupérer le formulaire spécifique par son ID avec ses questions
        // $formulaire = Formulaire::findOrFail($formulaireId);

        // Charger les questions liées à ce formulaire
        // $questions = Question::whereIn('id', $formulaire->questions()->pluck('id'))->orderBy('label', 'ASC')->get();

        // Retourner la vue avec les questions du formulaire
        // return Inertia::render('Answers/Index', [
        //     'questions' => $questions,
        // ]);
        return Inertia::render('Answers/Index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Questions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:choix,libre'],
        ]);

        Question::create([
            'label' => $request->input('label'),
            'type' => $request->input('type'),
        ]);

        session()->flash('flash.banner', 'Merci de votre participation !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        // useless
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return Inertia::render('Questions/Edit', [
            'question' => $question,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $this->validate($request, [
            'label' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:choix,libre'],
        ]);

        $question->update([
            'label' => $request->input('label'),
            'type' => $request->input('type'),
        ]);

        session()->flash('flash.banner', 'La question a été modifiée!');

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        session()->flash('flash.banner', 'La question a été détruite!');

        return redirect()->route('questions.index');
        // return Inertia::render('Questions/Delete', [
        //     'question' => $question,
        // ]);
        // return redirect()->route('questions.index');
    }

    public function deletetest(Question $question)
    {
        // $question->delete();
        // session()->flash('flash.banner', 'La question a été détruite!');

        // return redirect()->route('questions.index');
        return Inertia::render('Questions/Delete', [
            'question' => $question,
        ]);
    }
}
