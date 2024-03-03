<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'type',
    ];

    // public function formulaires()
    // {
    //     return $this->belongsToMany(Formulaire::class, 'formulaire_questions');
    // }

    // public function formulaires()
    // {
    //     return $this->belongsToMany(Formulaire::class);
    // }

    public function formulaires()
    {
        return $this->belongsToMany(Formulaire::class, 'formulaire_question');
    }

    //01/03/2024
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
