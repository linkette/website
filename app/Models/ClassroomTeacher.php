<?php

// app/ClassroomTeacher.php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassroomTeacher extends Model
{
    protected $table = 'classroom_teacher'; // Nombre de la tabla pivot

    protected $fillable = ['teacher_id', 'classroom_id']; // Atributos que se pueden llenar

    // Puedes agregar atributos adicionales a esta tabla si es necesario.
}
