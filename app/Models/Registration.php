<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'students_id',
        'cursos_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'students_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'cursos_id');
    }
}
