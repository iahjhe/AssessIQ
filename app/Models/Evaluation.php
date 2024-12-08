<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    //
    protected $fillable = [
        'user_id',
        'evaluator_id',
        'subject',
        'rating',
        'feedback',
    ];
    public function evaluator()
{
    return $this->belongsTo(User::class, 'evaluator_id');
}

public function teacher()
{
    return $this->belongsTo(User::class, 'user_id');
}


// Define relationship with Teacher


// Define relationship with Student
public function ratings()
{
    return $this->hasMany(Rating::class);
}

}
