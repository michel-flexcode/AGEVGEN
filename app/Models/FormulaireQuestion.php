<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulaireQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'formulaire_id',
        'question_id',
        // Ajoutez d'autres attributs fillable au besoin
    ];

    public function formulaire()
    {
        return $this->belongsTo(Formulaire::class);
    }

    /**
     * Obtenez la question associée à cette liaison.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
