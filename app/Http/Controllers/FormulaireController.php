<?php

namespace App\Http\Controllers;

use App\Models\Formulaire;
use App\Models\FormulaireQuestion;
use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormulaireSoumis;
use App\Models\Student;
use Illuminate\Support\Str;

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
        // dd($formulaires);
        return Inertia::render('Formulaires/Index', [
            'formulaires' => $formulaires,
        ]);
    }

    public function edit(Formulaire $formulaire)
    {
        // dd($formulaire);
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

    //29/02/2024 fonction bloc vide OK SI riend dans
    // public function send(Request $request)
    // {
    //     // Récupère l'ID du formulaire
    //     $formulaireNum = $request->input('id');

    //     // $allStudents = Student::all();
    //     $allStudents = Student::take(2)->get();
    //     $allEmailStudents = $allStudents->pluck('email');

    //     // Parcours chaque adresse e-mail
    //     // foreach ($allEmailStudents as $email) {
    //     //     // Construit l'URL vers le formulaire pour cet étudiant
    //     //     // $url = route('formulaires.show', ['id' => $formulaireNum]); // Assurez-vous d'ajuster le nom de la route si nécessaire

    //     //     // Envoie un e-mail à cette adresse e-mail avec le lien vers le formulaire
    //     //     Mail::to($email)->send(new FormulaireSoumis($request->all()));
    //     // }

    //     foreach ($allEmailStudents as $email) {
    //         // Générer l'URL vers la page answers/index
    //         $url = route('answers.index');
    //         // dd($url);
    //         // Envoie un e-mail à cette adresse e-mail avec le lien vers le formulaire
    //         // Vous pouvez inclure le lien dans le corps de l'e-mail
    //         Mail::to($email)->send(new FormulaireSoumis($url));
    //     }

    //     // Une fois que tous les e-mails ont été envoyés, tu peux rediriger l'utilisateur
    //     return Inertia::render('Dashboard');
    // }

    //function 2
    // public function send(Request $request)
    // {
    //     // Récupère l'ID du formulaire
    //     $formulaireNum = $request->input('id');

    //     // $allStudents = Student::all();
    //     $allStudents = Student::take(2)->get();
    //     $allEmailStudents = $allStudents->pluck('email');

    //     foreach ($allEmailStudents as $email) {
    //         // Générer l'URL vers la page answers/index
    //         // $url = route('answers.index');
    //         $url = route('answers.show', ['id' => $formulaireNum]);
    //         // dd($url);

    //         Mail::to($email)->send(new FormulaireSoumis($url));
    //     }

    //     // Une fois que tous les e-mails ont été envoyés, tu peux rediriger l'utilisateur
    //     return Inertia::render('Dashboard');
    // }

    //function 3 29/02/2024 last function """workin""" A pu fonctionné avec <li><a href="{{ route('answers.index') }}">Cliquez sur ce lien</a></li>
    public function send(Request $request)
    {
        $formulaireNum = $request->input('id');

        $allStudents = Student::all();
        // $allStudents = Student::take(2)->get();
        $allEmailStudents = $allStudents->pluck('email');

        foreach ($allEmailStudents as $email) {
            // Générer l'URL vers la page answers/index
            // $url = route('answers.index');
            $url = route('answers.show', ['answer' => $formulaireNum]);
            // dd($url);

            Mail::to($email)->send(new FormulaireSoumis($url, $formulaireNum));
        }
        return Inertia::render('Dashboard');
    }

    // } catch (\Exception $e) {
    //     // En cas d'erreur, renvoie une réponse Inertia avec le message d'erreur
    //     $errorMessage = 'Erreur lors de l\'envoi du formulaire : ' . $e->getMessage();
    //     return Inertia::render('Dashboard')->with('error', $errorMessage);
    // }
    // $formulaires = Formulaire::orderBy('name', 'ASC')->paginate(8);
    // $questions = $formulaire->questions;
    // return Inertia::render('Formulaires/Index', [
    //     'formulaire' => $formulaire,
    //     'questions' => $questions,
    //     // 'sendFormToStudents' => fn () => ['message' => 'coucou'],
    // ]);
    //        Mail::to(['mrmichelcecere@gmail.com'])->send(new FormulaireSoumis($request->all()));


    // Il faut séléctionner tout les $student mail
    // Il faut faire un lien avec selectionneurID vers answers.
    // Il faut que ce soit un lien vers un answers généré avec token

    // // dd($selectionneur);
    // $formulaire = Formulaire::where('id', $selectionneurID)->get();

    // // dd($formulaire);

    // // Tableau pour stocker les IDs des questions liées au formulaire
    // $stockArr = array();

    // // Récupérer toutes les questions liées au formulaire
    // $formulaireQuestions = FormulaireQuestion::where('formulaire_id', $selectionneurID)->get();

    // // dd($formulaireQuestions);

    // // Parcourir les questions et stocker leurs IDs dans $stockArr
    // foreach ($formulaireQuestions as $question) {
    //     $stockArr[] = $question->question_id;
    // }

    // dd($formulaireQuestions);



    // public function mail()
    // {
    //     try {
    //         // Construire l'objet du mail avec les données nécessaires
    //         $formData = [
    //             // Ajoutez ici les données spécifiques que vous souhaitez inclure dans le mail
    //         ];

    //         // Envoyer l'e-mail à mrmichelcecere@gmail.com
    //         Mail::to('mrmichelcecere@gmail.com')->send(new FormulaireSoumis($formData));

    //         // Si le mail est envoyé avec succès, vous pouvez renvoyer une réponse appropriée
    //         return response()->json(['message' => 'Mail envoyé avec succès'], 200);
    //     } catch (\Exception $e) {
    //         // En cas d'erreur lors de l'envoi du mail, vous pouvez renvoyer un message d'erreur
    //         return response()->json(['error' => 'Erreur lors de l\'envoi du mail : ' . $e->getMessage()], 500);
    //     }
    //}




    public function show(Formulaire $formulaire)
    {
        // Récupérer les questions associées à ce formulaire spécifique
        $questions = $formulaire->questions;

        // Retourner la vue avec les détails du formulaire et les questions associées
        return Inertia::render('Formulaires/Show', [
            'formulaire' => $formulaire,
            'questions' => $questions,
            // 'sendFormToStudents' => fn () => ['message' => 'coucou'],
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
