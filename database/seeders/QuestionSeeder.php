<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'label' => "De manière générale, comment évalueriez-vous...",
            'type' => 'libre',
        ]);

        Question::create([
            'label' => "Ajoutez, si vous le souhaitez, un commentaire par rapport à la grille ci-dessus.",
            'type' => 'libre',
        ]);

        Question::create([
            'label' => "Le cours vous a-t-il paru difficile?",
            'type' => 'libre',
        ]);
        Question::create([
            'label' => "Que vous a apporté le cours? Qu'avez-vous appris?",
            'type' => 'libre',
        ]);
        Question::create([
            'label' => "Sous quel format avez-vous reçu les notes de cours?",
            'type' => 'libre',
        ]);
        Question::create([
            'label' => "Selon vous, l'enseignement proposé développe-t-il votre faculté d'adaptation à de nouvelles matières?",
            'type' => 'libre',
        ]);
        Question::create([
            'label' => "Avez-vous eu connaissance des objectifs du cours?",
            'type' => 'libre',
        ]);
        Question::create([
            'label' => "Les objectifs, tels qu'énoncés, ont-ils été atteints?",
            'type' => 'libre',
        ]);
        Question::create([
            'label' => "Commentez votre choix à la question précédente",
            'type' => 'libre',
        ]);
        Question::create([
            'label' => "Que pensez-vous de la quantité de matière vue pour ce cours dans le cadre du temps attribué?",
            'type' => 'libre',
        ]);
        Question::create([
            'label' => "Le mode d'évaluation pour ce cours est-il pertinent?",
            'type' => 'libre',
        ]);
    }
}
