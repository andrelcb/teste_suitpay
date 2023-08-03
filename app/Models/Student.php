<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'date_of_birth'
    ];


    public function registrations()
    {
        return $this->hasMany(Registration::class, 'students_id');
    }
}
