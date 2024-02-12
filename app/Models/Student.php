<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;
    //OLD polymorphism
    // protected $model = User::class;

    protected $fillable = [
        'name',
        'surname',
        'email',
        //'section_id',
    ];

    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(StudentSection::class, 'student_sections');
    }

    public function StudentCourses(): BelongsToMany
    {
        return $this->belongsToMany(StudentCourse::class, 'student_courses');
    }
}
