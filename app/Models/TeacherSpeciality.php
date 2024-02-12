<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeacherSpeciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'speciality_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
