<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_at',
        'end_at'
    ];

    public function Lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function Question()
    {
        return $this->hasMany(Question::class);
    }

}
