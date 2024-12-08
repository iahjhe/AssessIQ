<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows naming convention)
    protected $table = 'teachers';

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',  // If you are storing passwords
    ];
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'teacher_id');
    }
    
    // Optionally define any relationships (e.g., to subjects)
}
