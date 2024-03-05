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

    public function formulaire()
    {
        return $this->belongsTo(Formulaire::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
