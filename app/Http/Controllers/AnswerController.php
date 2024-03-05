<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Formulaire;
use App\Models\FormulaireQuestion;
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
    // public function store(Request $request)
    // {
    //     // dd($request);
    //     $tableauDegeulasse = $request->all(); // Obtenez tous les paramètres de la demande sous forme de tableau
    // $parametres = [];

    // foreach ($tableauDegeulasse as $key => $value) {
    //     $parametres[$key] = $value;
    // }

    // // Maintenant, $parametres contient un tableau des paramètres de la demande
    // $x = count($parametres); // Utilisez count() pour obtenir la longueur du tableau
    // dd($x);
  
    //     $this->validate($request, [
    //         'formulaire_id' => ['required', 'integer', 'exists:formulaires,id'],
    //         'answers' => ['array'],
    //         'answers.*.question_id' => ['required', 'integer', 'exists:questions,id'],
    //         'answers.*.value' => ['required', 'string'],
    //         'answers.*.type' => ['required', 'string'],
    //     ]);

    //     //boucle answers et enregistrer
    //     // Créer le answers
    //     $answer = Answer::create([
    //         'formulaire_id' => $validatedData[''],
    //         'questiid' => $validatedData[''],
    //         'response' => $validatedData['value'],
    //     ]);

    //     // Initialiser un tableau pour stocker les données à insérer
    //     $formulaireAnswers = [];

    //     // Boucle sur chaque question
    //     for ($i = 1; $i <= 50; $i++) {
    //         // Vérifier si la question existe dans les données validées
    //         if (isset($validatedData["question$i"])) {
    //             // Ajouter la question au tableau des données à insérer
    //             $formulaireAnswers[] = [
    //                 'formulaire_id' => $answer->id,
    //                 '' => $validatedData["$i"],
    //             ];
    //         }
    //     }

    //     // Insérer toutes les questions à la fin
    //     Answers::insert($formulaireAnswers);

    //     // Rediriger avec un message flash
    //     return redirect()->route('formulaires.index')
    //         ->with('success', 'Formulaire créé avec succès.');
    // }   


    public function store(Request $request)
{
    // Valider les données de la demande
    $validatedData = $request->validate([
        'formulaire_id' => ['required', 'integer', 'exists:formulaires,id'],
        'answers' => ['array'],
        // 'answers.*.question_id' => ['required', 'integer', 'exists:questions,id'],
        // 'answers.*.value' => ['required', 'string'],
        // 'answers.*.type' => ['required', 'string'],
    ]);

    foreach ($validatedData['answers'] as $answerData) {
        // Créer une réponse
        $answer = Answer::create([
            'formulaire_id' => $validatedData['formulaire_id'],
            'question_id' => $answerData['question_id'],
            'response' => $answerData['value'], 
        ]);

        // Vous pouvez effectuer d'autres opérations nécessaires avec chaque réponse ici
    }

    // Rediriger avec un message flash
    return redirect()->route('formulaires.index')->with('success', 'Formulaire créé avec succès.');
}

    /**
     * Display the specified resource.
     */

    //  fonction 3 dysfonctionnel
    // public function show(Answer $answer)
    // {
    //     // Récupérer le formulaire associé à cette réponse
    //     $formulaire = $answer->formulaire;

    //     if (!$formulaire) {
    //         // Si aucun formulaire associé n'est trouvé, retourner une erreur ou une réponse appropriée
    //         return response()->json(['error' => 'Formulaire non trouvé'], 404);
    //     }

    //     // Récupérer les questions associées à ce formulaire spécifique
    //     $questions = $formulaire->questions;

    //     // Retourner la vue avec les détails du formulaire et les questions associées
    //     return Inertia::render('Answers/Show', [
    //         'answer' => $answer,
    //         'formulaire' => $formulaire,
    //         'questions' => $questions,
    //     ]);
    // }


    // Fonction 2 "no data mais mail ok"
    // public function show(Answer $formulaire)
    // {
    //     // dd($formulaire);
    //     // Récupérer les questions associées à ce formulaire spécifique
    //     $questions = $formulaire->questions;
    //     // dd($formulaire);
    //     // Retourner la vue avec les détails du formulaire et les questions associées
    //     return Inertia::render('Answers/Show', [
    //         'formulaire' => $formulaire,
    //         'questions' => $questions,
    //         // 'sendFormToStudents' => fn () => ['message' => 'coucou'],
    //     ]);
    // }
    // Fonction 4 bourrin "no data mais mail ok"
    public function show(int $id)
    {
        // dd($id);
        $formulaire = Formulaire::find($id);
        $formulaire->load("questions");

        return Inertia::render('Answers/Show', [
            'formulaire' => $formulaire,
        ]);
    }

    //     public function show(Answer $answer)
    // {
    //     // Récupérer le formulaire associé à cette réponse
    //     $formulaire = $answer->formulaire()->first(); // Utiliser first() pour obtenir le premier résultat

    //     if (!$formulaire) {
    //         // Si aucun formulaire associé n'est trouvé, retourner une erreur ou une réponse appropriée
    //         return response()->json(['error' => 'Formulaire non trouvé'], 404);
    //     }

    //     // Récupérer les questions associées à ce formulaire spécifique
    //     $questions = $formulaire->questions;

    //     // Retourner la vue avec les détails du formulaire et les questions associées
    //     return Inertia::render('Formulaires/Show', [
    //         'formulaire' => $formulaire,
    //         'questions' => $questions,
    //     ]);
    // }

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
