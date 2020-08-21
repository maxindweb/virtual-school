<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'description',
        'courses_id'
    ];

    public function Courses()
    {
        return $this->belongsTo(Courses::class);
    }

    public function Quiz()
    {
        return $this->hasMany(Quiz::class);
    }

    public function Assigment()
    {
        return $this->hasMany(Assigment::class);
    }
}
