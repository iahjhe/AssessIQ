<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class); // Each student can have multiple evaluations
    }
}
