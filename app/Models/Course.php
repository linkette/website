<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable =['name'];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }
}