<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'courses_id',
        'user_id'
    ];

    public function Courses()
    {
        return $this->belongsToMany(Courses::class);
    }

    public function User()
    {
        return $this->belongsToMany(User::class);
    }
}
