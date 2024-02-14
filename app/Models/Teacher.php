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
        'course1',
        'course2',
        'course3',
        'course4',
        'course5',
        'course6',
        'course7',
        'course8',
        'course9',
        'course10',
        'course11',
        'course12',
    ];


    public function specialities(): BelongsToMany
    {
        return $this->belongsToMany(Speciality::class, 'teacher_specialities');
    }
}
