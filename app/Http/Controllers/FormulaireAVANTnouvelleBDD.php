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
    // public function store(Request $request)
    // {
    //     dd($request);
    //     // Validation des données du formulaire
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //     ]);

    //     // Création du formulaire
    //     Formulaire::create($request->all());

    //     // Redirection avec un message de succès
    //     return redirect()->route('formulaires.index')
    //         ->with('success', 'Formulaire créé avec succès.');
    // }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'description' => ['required', 'string', 'max:255'],
    //         'question1' => [
    //             'required', 'numeric', 'exists:questions,id'
    //         ],
    //         'question2' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question3' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question4' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question5' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question6' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question7' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question8' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question9' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question10' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question11' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question12' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question13' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question14' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question15' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question16' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question17' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question18' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question19' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question20' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question21' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question22' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question23' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question24' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question25' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question26' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question27' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question28' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question29' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question30' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question31' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question32' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question33' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question34' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question35' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question36' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question37' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question38' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question39' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question40' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question41' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question42' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question43' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question44' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question45' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question46' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question47' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question48' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question49' => ['nullable', 'numeric', 'exists:questions,id'],
    //         'question50' => ['nullable', 'numeric', 'exists:questions,id'],
    //     ]);
    //     // dd($request);
    //     Formulaire::create([
    //         'name' => $request->input('name'),
    //         'description' => $request->input('description'), 'question1' => $request->input('question1'),
    //         'question2' => $request->input('question2'),
    //         'question3' => $request->input('question3'),
    //         'question4' => $request->input('question4'),
    //         'question5' => $request->input('question5'),
    //         'question6' => $request->input('question6'),
    //         'question7' => $request->input('question7'),
    //         'question8' => $request->input('question8'),
    //         'question9' => $request->input('question9'),
    //         'question10' => $request->input('question10'),
    //         'question11' => $request->input('question11'),
    //         'question12' => $request->input('question12'),
    //         'question13' => $request->input('question13'),
    //         'question14' => $request->input('question14'),
    //         'question15' => $request->input('question15'),
    //         'question16' => $request->input('question16'),
    //         'question17' => $request->input('question17'),
    //         'question18' => $request->input('question18'),
    //         'question19' => $request->input('question19'),
    //         'question20' => $request->input('question20'),
    //         'question21' => $request->input('question21'),
    //         'question22' => $request->input('question22'),
    //         'question23' => $request->input('question23'),
    //         'question24' => $request->input('question24'),
    //         'question25' => $request->input('question25'),
    //         'question26' => $request->input('question26'),
    //         'question27' => $request->input('question27'),
    //         'question28' => $request->input('question28'),
    //         'question29' => $request->input('question29'),
    //         'question30' => $request->input('question30'),
    //         'question31' => $request->input('question31'),
    //         'question32' => $request->input('question32'),
    //         'question33' => $request->input('question33'),
    //         'question34' => $request->input('question34'),
    //         'question35' => $request->input('question35'),
    //         'question36' => $request->input('question36'),
    //         'question37' => $request->input('question37'),
    //         'question38' => $request->input('question38'),
    //         'question39' => $request->input('question39'),
    //         'question40' => $request->input('question40'),
    //         'question41' => $request->input('question41'),
    //         'question42' => $request->input('question42'),
    //         'question43' => $request->input('question43'),
    //         'question44' => $request->input('question44'),
    //         'question45' => $request->input('question45'),
    //         'question46' => $request->input('question46'),
    //         'question47' => $request->input('question47'),
    //         'question48' => $request->input('question48'),
    //         'question49' => $request->input('question49'),
    //         'question50' => $request->input('question50'),
    //     ]);

    //     session()->flash('flash.banner', 'Un formulaire a été ajouté!');
    // }

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

    // public function store(Request $request)
    // {
    //     $validateData = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'question' => ['required', 'exists:questions,id'],
    //         // Utilisez le tableau compact() pour éliminer les valeurs null de votre tableau de validation
    //         ...array_map(fn ($index) => ["question$index" => ['nullable', 'numeric', 'exists:questions,id']], range(2, 12)),
    //     ]);

    //     $section = Section::create([
    //         'name' => $request->input('name'),
    //     ]);

    //     // Création des associations avec les cours
    //     foreach (range(1, 502) as $index) {
    //         if (isset($validateData["question$index"])) {
    //             $sectionQuestion = new SectionQuestion([
    //                 'section_id' => $section->id,
    //                 'question_id' => $validateData["question$index"],
    //             ]);
    //             $sectionQuestion->save();
    //         }
    //     }

    //     // Message flash
    //     session()->flash('flash.banner', 'La section a été ajoutée!');
    // }

    // Ajoutez les autres méthodes du contrôleur ici, comme show(), edit(), update(), etc.
    // public function edit(Formulaire $formulaire)
    // {
    //     $formulaireNum = $formulaire->id;
    //     echo 'numéro du formualire : ';
    //     echo $formulaireNum;

    //     $stockArr = array();

    //     $formulaireQuestions = FormulaireQuestion::all();

    //     // echo ($formulaireQuestions);

    //     $longeur = count($formulaireQuestions); // 31 occurences

    //     // Boucle pour parcourir les éléments de $formulaireQuestions
    //     for ($i = 0; $i < $longeur; $i++) {
    //         // Vérifier si le formulaire_id correspond à $formulaireNum
    //         if ($formulaireQuestions[$i]->formulaire_id === $formulaireNum) {
    //             // Ajouter question_id à $stockArr
    //             $stockArr[] = $formulaireQuestions[$i]->question_id;
    //         }
    //     }

    //     echo 'stop';
    //     var_dump($stockArr);
    //     // Partie deux on va comparer le stockARR avec les questions pour les rendre dans edit
    //     $questionss = Question::all();
    //     dd($questionss);


    //     $questions = Question::whereIn('id', [
    //         $formulaire->question1,
    //         $formulaire->question2,
    //         $formulaire->question3,
    //         $formulaire->question4,
    //         $formulaire->question5,
    //         $formulaire->question6,
    //         $formulaire->question7,
    //         $formulaire->question8,
    //         $formulaire->question9,
    //         $formulaire->question10,
    //         $formulaire->question11,
    //         $formulaire->question12,
    //     ])->pluck('label', 'id')->toArray();

    //     $allQuestions = Question::all();

    //     return Inertia::render('Formulaires/Edit', [
    //         'formulaire' => $formulaire,
    //         'questions' => $questions,
    //         'allQuestions' => $allQuestions,
    //     ]);
    // }

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
        // dd($request);
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            // Ajouter ici les règles de validation pour les cours multiples
            'question1' => ['nullable', 'integer'],
            'question2' => ['nullable', 'integer'],
            'question3' => ['nullable', 'integer'],
            'question4' => ['nullable', 'integer'],
            'question5' => ['nullable', 'integer'],
            'question6' => ['nullable', 'integer'],
            'question7' => ['nullable', 'integer'],
            'question8' => ['nullable', 'integer'],
            'question9' => ['nullable', 'integer'],
            'question10' => ['nullable', 'integer'],
            'question11' => ['nullable', 'integer'],
            'question12' => ['nullable', 'integer'],
            'question13' => ['nullable', 'integer'],
            'question14' => ['nullable', 'integer'],
            'question15' => ['nullable', 'integer'],
            'question16' => ['nullable', 'integer'],
            'question17' => ['nullable', 'integer'],
            'question18' => ['nullable', 'integer'],
            'question19' => ['nullable', 'integer'],
            'question20' => ['nullable', 'integer'],
            'question21' => ['nullable', 'integer'],
            'question22' => ['nullable', 'integer'],
            'question23' => ['nullable', 'integer'],
            'question24' => ['nullable', 'integer'],
            'question25' => ['nullable', 'integer'],
            'question26' => ['nullable', 'integer'],
            'question27' => ['nullable', 'integer'],
            'question28' => ['nullable', 'integer'],
            'question29' => ['nullable', 'integer'],
            'question30' => ['nullable', 'integer'],
            'question31' => ['nullable', 'integer'],
            'question32' => ['nullable', 'integer'],
            'question33' => ['nullable', 'integer'],
            'question34' => ['nullable', 'integer'],
            'question35' => ['nullable', 'integer'],
            'question36' => ['nullable', 'integer'],
            'question37' => ['nullable', 'integer'],
            'question38' => ['nullable', 'integer'],
            'question39' => ['nullable', 'integer'],
            'question40' => ['nullable', 'integer'],
            'question41' => ['nullable', 'integer'],
            'question42' => ['nullable', 'integer'],
            'question43' => ['nullable', 'integer'],
            'question44' => ['nullable', 'integer'],
            'question45' => ['nullable', 'integer'],
            'question46' => ['nullable', 'integer'],
            'question47' => ['nullable', 'integer'],
            'question48' => ['nullable', 'integer'],
            'question49' => ['nullable', 'integer'],
            'question50' => ['nullable', 'integer'],

        ]);

        // Mettre à jour les informations de l'enseignant
        $formulaire->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            // Mettre à jour les cours multiples
            'question1' => $request->input('question1'),
            'question2' => $request->input('question2'),
            'question3' => $request->input('question3'),
            'question4' => $request->input('question4'),
            'question5' => $request->input('question5'),
            'question6' => $request->input('question6'),
            'question7' => $request->input('question7'),
            'question8' => $request->input('question8'),
            'question9' => $request->input('question9'),
            'question10' => $request->input('question10'),
            'question11' => $request->input('question11'),
            'question12' => $request->input('question12'),
            'question13' => $request->input('question13'),
            'question14' => $request->input('question14'),
            'question15' => $request->input('question15'),
            'question16' => $request->input('question16'),
            'question17' => $request->input('question17'),
            'question18' => $request->input('question18'),
            'question19' => $request->input('question19'),
            'question20' => $request->input('question20'),
            'question21' => $request->input('question21'),
            'question22' => $request->input('question22'),
            'question23' => $request->input('question23'),
            'question24' => $request->input('question24'),
            'question25' => $request->input('question25'),
            'question26' => $request->input('question26'),
            'question27' => $request->input('question27'),
            'question28' => $request->input('question28'),
            'question29' => $request->input('question29'),
            'question30' => $request->input('question30'),
            'question31' => $request->input('question31'),
            'question32' => $request->input('question32'),
            'question33' => $request->input('question33'),
            'question34' => $request->input('question34'),
            'question35' => $request->input('question35'),
            'question36' => $request->input('question36'),
            'question37' => $request->input('question37'),
            'question38' => $request->input('question38'),
            'question39' => $request->input('question39'),
            'question40' => $request->input('question40'),
            'question41' => $request->input('question41'),
            'question42' => $request->input('question42'),
            'question43' => $request->input('question43'),
            'question44' => $request->input('question44'),
            'question45' => $request->input('question45'),
            'question46' => $request->input('question46'),
            'question47' => $request->input('question47'),
            'question48' => $request->input('question48'),
            'question49' => $request->input('question49'),
            'question50' => $request->input('question50'),
        ]);

        session()->flash('flash.banner', 'Le formulaire a été modifié!');

        return redirect()->route('formulaires.index');
    }

    public function destroy(Formulaire $formulaire)
    {
        $formulaire->delete();
        session()->flash('flash.banner', 'La evaluation a été détruite!');

        return redirect()->route('formulaires.index');
    }
}
