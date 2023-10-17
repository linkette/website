<?php

// app/Classroom.php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['name', 'capacidad']; // Atributos que se pueden llenar

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'classroom_teacher')
            ->withTimestamps(); // Esto agrega automáticamente las columnas created_at y updated_at en la tabla pivot.
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)
            ->withTimestamps(); // Esto agrega automáticamente las columnas created_at y updated_at en la tabla pivot.
    }
}
