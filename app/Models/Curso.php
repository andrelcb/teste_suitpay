<?php

namespace App\Models;

use App\Enums\CursoTypes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'maximum_number__enrollments',
        'allowed_registration_date'
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'cursos_id');
    }
}
