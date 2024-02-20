<?php

namespace Database\Factories;

use App\Models\Formulaire;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FormulaireQuestion>
 */
class FormulaireQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'formulaire_id' => Formulaire::factory(),
            'question_id' => Question::factory(),
        ];
    }
}
