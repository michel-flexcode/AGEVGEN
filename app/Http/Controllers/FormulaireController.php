<?php

namespace App\Http\Controllers;

use App\Models\Formulaire;
use App\Models\FormulaireQuestion;
use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FormulaireController extends Controller
{
    /**
     * Affiche la liste des formulaires.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $formulaires = Formulaire::orderBy('name', 'ASC')->paginate(8);
        // dd($teachers);
        return Inertia::render('Formulaires/Index', [
            'formulaires' => $formulaires,
        ]);
    }

    // public function sendToStudents(Request $request)
    // {
    //     // Récupérer les données du formulaire depuis la requête
    //     $formData = $request->all();

    //     // Préparer le contenu de l'e-mail
    //     $emailContent = "Voici les données du formulaire : \n";
    //     foreach ($formData as $key => $value) {
    //         $emailContent .= "$key: $value \n";
    //     }

    //     // Récupérer la liste des étudiants (par exemple depuis la base de données)
    //     $students = User::where('role', 'student')->get();

    //     // Envoyer l'e-mail à chaque étudiant
    //     foreach ($students as $student) {
    //         // Envoyer l'e-mail
    //         Mail::to($student->email)->send(new FormulaireNotification($emailContent));
    //     }

    //     // Rediriger ou renvoyer une réponse appropriée
    //     return redirect()->route('formulaires.index')->with('success', 'L\'e-mail a été envoyé à tous les étudiants avec succès.');
    // }


    public function show(Formulaire $formulaire)
    {
        // Retourner la vue avec les détails du formulaire
        return Inertia::render('Formulaires/Show', [
            'formulaire' => $formulaire
        ]);
    }


    /**
     * Affiche le formulaire pour créer un nouveau formulaire.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $questions = Question::all(); // Récupérer toutes les questions disponibles
        return Inertia::render('Formulaires/Create', [
            'questions' => $questions,
        ]);
    }

    /**
     * Stocke un formulaire nouvellement créé dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'question1' => [
                'required', 'numeric', 'exists:questions,id'
            ],
            'question2' => ['nullable', 'numeric', 'exists:questions,id'],
            'question3' => ['nullable', 'numeric', 'exists:questions,id'],
            'question4' => ['nullable', 'numeric', 'exists:questions,id'],
            'question5' => ['nullable', 'numeric', 'exists:questions,id'],
            'question6' => ['nullable', 'numeric', 'exists:questions,id'],
            'question7' => ['nullable', 'numeric', 'exists:questions,id'],
            'question8' => ['nullable', 'numeric', 'exists:questions,id'],
            'question9' => ['nullable', 'numeric', 'exists:questions,id'],
            'question10' => ['nullable', 'numeric', 'exists:questions,id'],
            'question11' => ['nullable', 'numeric', 'exists:questions,id'],
            'question12' => ['nullable', 'numeric', 'exists:questions,id'],
            'question13' => ['nullable', 'numeric', 'exists:questions,id'],
            'question14' => ['nullable', 'numeric', 'exists:questions,id'],
            'question15' => ['nullable', 'numeric', 'exists:questions,id'],
            'question16' => ['nullable', 'numeric', 'exists:questions,id'],
            'question17' => ['nullable', 'numeric', 'exists:questions,id'],
            'question18' => ['nullable', 'numeric', 'exists:questions,id'],
            'question19' => ['nullable', 'numeric', 'exists:questions,id'],
            'question20' => ['nullable', 'numeric', 'exists:questions,id'],
            'question21' => ['nullable', 'numeric', 'exists:questions,id'],
            'question22' => ['nullable', 'numeric', 'exists:questions,id'],
            'question23' => ['nullable', 'numeric', 'exists:questions,id'],
            'question24' => ['nullable', 'numeric', 'exists:questions,id'],
            'question25' => ['nullable', 'numeric', 'exists:questions,id'],
            'question26' => ['nullable', 'numeric', 'exists:questions,id'],
            'question27' => ['nullable', 'numeric', 'exists:questions,id'],
            'question28' => ['nullable', 'numeric', 'exists:questions,id'],
            'question29' => ['nullable', 'numeric', 'exists:questions,id'],
            'question30' => ['nullable', 'numeric', 'exists:questions,id'],
            'question31' => ['nullable', 'numeric', 'exists:questions,id'],
            'question32' => ['nullable', 'numeric', 'exists:questions,id'],
            'question33' => ['nullable', 'numeric', 'exists:questions,id'],
            'question34' => ['nullable', 'numeric', 'exists:questions,id'],
            'question35' => ['nullable', 'numeric', 'exists:questions,id'],
            'question36' => ['nullable', 'numeric', 'exists:questions,id'],
            'question37' => ['nullable', 'numeric', 'exists:questions,id'],
            'question38' => ['nullable', 'numeric', 'exists:questions,id'],
            'question39' => ['nullable', 'numeric', 'exists:questions,id'],
            'question40' => ['nullable', 'numeric', 'exists:questions,id'],
            'question41' => ['nullable', 'numeric', 'exists:questions,id'],
            'question42' => ['nullable', 'numeric', 'exists:questions,id'],
            'question43' => ['nullable', 'numeric', 'exists:questions,id'],
            'question44' => ['nullable', 'numeric', 'exists:questions,id'],
            'question45' => ['nullable', 'numeric', 'exists:questions,id'],
            'question46' => ['nullable', 'numeric', 'exists:questions,id'],
            'question47' => ['nullable', 'numeric', 'exists:questions,id'],
            'question48' => ['nullable', 'numeric', 'exists:questions,id'],
            'question49' => ['nullable', 'numeric', 'exists:questions,id'],
            'question50' => ['nullable', 'numeric', 'exists:questions,id'],
        ]);

        // Créer le formulaire
        $formulaire = Formulaire::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        // Initialiser un tableau pour stocker les données à insérer
        $formulaireQuestions = [];

        // Boucle sur chaque question
        for ($i = 1; $i <= 50; $i++) {
            // Vérifier si la question existe dans les données validées
            if (isset($validatedData["question$i"])) {
                // Ajouter la question au tableau des données à insérer
                $formulaireQuestions[] = [
                    'formulaire_id' => $formulaire->id,
                    'question_id' => $validatedData["question$i"],
                ];
            }
        }

        // Insérer toutes les questions à la fin
        FormulaireQuestion::insert($formulaireQuestions);

        // Rediriger avec un message flash
        return redirect()->route('formulaires.index')
            ->with('success', 'Formulaire créé avec succès.');
    }

    public function edit(Formulaire $formulaire)
    {
        // Récupérer l'ID du formulaire
        $formulaireNum = $formulaire->id;

        // Tableau pour stocker les IDs des questions liées au formulaire
        $stockArr = array();

        // Récupérer toutes les questions liées au formulaire
        $formulaireQuestions = FormulaireQuestion::where('formulaire_id', $formulaireNum)->get();

        // Parcourir les questions et stocker leurs IDs dans $stockArr
        foreach ($formulaireQuestions as $question) {
            $stockArr[] = $question->question_id;
        }

        // Récupérer les questions correspondant aux IDs stockés dans $stockArr
        $questions = Question::whereIn('id', $stockArr)->get();
        //dd($questions);
        // Récupérer toutes les questions
        $allQuestions = Question::all();

        // Rendre la vue avec les données nécessaires
        return Inertia::render('Formulaires/Edit', [
            'formulaire' => $formulaire,
            'questions' => $questions,
            'allQuestions' => $allQuestions,
        ]);
    }

    public function update(Request $request, Formulaire $formulaire)
    {
        // Valider les champs communs
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        // Valider les questions
        $this->validateQuestions($request);

        // Mettre à jour le formulaire
        $formulaire->update($request->only('name', 'description'));

        // Mettre à jour les relations dans la table intermédiaire
        $this->updateFormulaireQuestions($request, $formulaire);

        return redirect()->route('formulaires.index')->with('success', 'Formulaire mis à jour avec succès.');
    }

    protected function validateQuestions(Request $request)
    {
        $questions = collect($request->get('formulaire_questions', []));

        // Valider chaque question
        $questions->each(function ($questionId, $questionNumber) use ($request) {
            $this->validate($request, [
                "formulaire_questions.{$questionNumber}" => ['nullable', 'integer'],
            ]);
        });
    }

    // protected function updateFormulaireQuestions(Request $request, Formulaire $formulaire)
    // {
    //     // Récupérer les questions envoyées dans la requête
    //     $questions = collect($request->get('formulaire_questions', []));

    //     // Mettre à jour les relations dans la table intermédiaire
    //     $questions->each(function ($questionId, $questionNumber) use ($formulaire) {
    //         // Si la question a une valeur (non null), associez-la au formulaire
    //         if (!is_null($questionId)) {
    //             FormulaireQuestion::updateOrCreate([
    //                 'formulaire_id' => $formulaire->id,
    //                 'question_id' => $questionId,
    //             ]);
    //         }
    //     });
    // }

    protected function updateFormulaireQuestions(Request $request, Formulaire $formulaire)
    {
        // Récupérer les questions envoyées dans la requête
        $questions = collect($request->get('formulaire_questions', []));

        // Supprimer les entrées existantes pour ce formulaire
        $formulaire->questions()->detach();

        // Mettre à jour les relations dans la table intermédiaire
        $questions->each(function ($questionId, $questionNumber) use ($formulaire) {
            // Si la question a une valeur (non null), associez-la au formulaire
            if (!is_null($questionId)) {
                $formulaire->questions()->attach($questionId);
            }
        });
    }

    public function destroy(Formulaire $formulaire)
    {
        $formulaire->delete();
        session()->flash('flash.banner', 'Le formulaire a été détruit!');

        return redirect()->route('formulaires.index');
    }
}
