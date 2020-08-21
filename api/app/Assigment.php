<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assigment extends Model
{
    use SoftDeletes;

    protected $fillable = 
    [
        'title',
        'description',
        'start',
        'end',
        'courses_id'
    ];

    public function Courses()
    {
        return $this->belongsTo(Courses::class);
    }

    public function Enrollment()
    {

    }
}
