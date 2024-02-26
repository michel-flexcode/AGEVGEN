<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\TeacherController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    // Ajoutez cette nouvelle route pour la vue 'Evaluation'
    Route::get('/Evaluation', function () {
        // Vous pouvez passer des données supplémentaires à votre composant si nécessaire
        return Inertia::render('Evaluation');
    })->name('Evaluation');


    Route::resource('/questions', QuestionController::class);
    Route::resource('/teachers', TeacherController::class);
    Route::resource('/students', StudentController::class);
    Route::resource('/courses', CourseController::class);
    Route::resource('/sections', SectionController::class);
    Route::resource('/evaluations', EvaluationController::class);
    //Route::get('/formulaires/{formulaireId}', [AnswerController::class, 'index']);
    Route::resource('/answers', AnswerController::class);
    // Route::get('/formulaires/{formulaire}/show', [FormulaireController::class, 'show'])->name('formulaires.show');
    // Route::get('/formulaires/{formulaire}', [FormulaireController::class, 'show'])->name('formulaires.show');
    // Route::post('/formulaires/sendToStudents', [FormulaireController::class, 'sendToStudents'])->name('formulaires.sendToStudents');
    // Route::post('/formulaires/sendToStudents', [FormulaireController::class, 'sendToStudents']);
    // Route::get('/formulaires/{formulaire}', [FormulaireController::class, 'show'])->name('formulaires.show');
    // Route::post('/formulaires/show', [FormulaireController::class, 'send'])->name('formulaires.send');
    Route::post('/formulaires/send', [FormulaireController::class, 'send'])->name('formulaires.send');
    Route::resource('/formulaires', FormulaireController::class);
    // Route::post('/formulaires', [FormulaireController::class, 'send']);
    Route::get('/formulaires/mail', [FormulaireController::class, 'mail'])->name('formulaires.mail');

    //https://laravel.sillo.org/cours-laravel-10-les-bases-envoyer-un-email/ tutoriel
    Route::get('contact', [ContactController::class, 'create']);
    Route::post('contact', [ContactController::class, 'store']);

    Route::get('/test-contact', function () {
        return new App\Mail\Contact([
            'nom' => 'Durand',
            'email' => 'durand@chezlui.com',
            'message' => 'Je voulais vous dire que votre site est magnifique !'
        ]);
    });

    // Route::post('/envoyer-formulaire', [FormulaireController::class, 'envoyerFormulaire']);

    // [21:34] Thibault Six
    Route::get('/form/mail', [FormulaireController::class, 'mail'])->name('form.mail');

    Route::get('questions/delete/{question}', [QuestionController::class, 'deletetest']);
});
