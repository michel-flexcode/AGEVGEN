<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
    ];


    public function specialities(): BelongsToMany
    {
        return $this->belongsToMany(Speciality::class, 'teacher_specialities');
    }
}
