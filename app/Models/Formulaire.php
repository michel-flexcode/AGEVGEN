<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'question1',
        'question2',
        'question3',
        'question4',
        'question5',
        'question6',
        'question7',
        'question8',
        'question9',
        'question10',
        'question11',
        'question12',
        'question13',
        'question14',
        'question15',
        'question16',
        'question17',
        'question18',
        'question19',
        'question20',
        'question21',
        'question22',
        'question23',
        'question24',
        'question25',
        'question26',
        'question27',
        'question28',
        'question29',
        'question30',
        'question31',
        'question32',
        'question33',
        'question34',
        'question35',
        'question36',
        'question37',
        'question38',
        'question39',
        'question40',
        'question41',
        'question42',
        'question43',
        'question44',
        'question45',
        'question46',
        'question47',
        'question48',
        'question49',
        'question50',
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

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'formulaire_questions');
    }
    //01/03/2024
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
