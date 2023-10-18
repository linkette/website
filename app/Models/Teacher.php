<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable =['name', 'email'];


    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_teacher')
            ->withTimestamps(); // Esto agrega automáticamente las columnas created_at y updated_at en la tabla pivot.
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)
            ->withTimestamps(); // Esto agrega automáticamente las columnas created_at y updated_at en la tabla pivot.
    }

}
