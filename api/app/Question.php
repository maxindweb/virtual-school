<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
        'score',
        'quiz_id',
        'type_id'
    ];

    public function Option()
    {
        return $this->hasMany(Option::class);
    }

    public function Quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
