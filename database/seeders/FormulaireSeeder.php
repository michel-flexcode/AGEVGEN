<?php

namespace Database\Seeders;

use App\Models\Formulaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormulaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Formulaire::factory()
            ->count(50)
            ->create();
    }
}
