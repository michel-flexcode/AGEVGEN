<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'formulaire_id',
        'question_id',
        'response',
    ];

    // public function questions()
    // {
    //     return $this->belongsToMany(Question::class, 'formulaire_questions');
    // }


    // public function questions()
    // {
    //     return $this->hasMany(Question::class);
    // }


    // public function reponses()
    // {
    //     return $this->hasMany(Reponse::class);
    // }

    // public function questions()
    // {
    //     return $this->belongsToMany(Question::class);
    // }

    // public function questions()
    // {
    //     return $this->belongsToMany(Question::class, 'formulaire_questions');
    // }

    public function formulaire()
    {
        return $this->belongsTo(Formulaire::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
