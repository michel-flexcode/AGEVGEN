<?php

namespace Database\Seeders;

use App\Models\FormulaireQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormulaireQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormulaireQuestion::factory()->count(14)->create();
    }
}
