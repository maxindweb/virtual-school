<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'title'
    ];

    public function Enrollment()
    {
        //
    }

    public function Lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}
