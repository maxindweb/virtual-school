<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    protected $fillable = [
        'type'
    ];

    public function Question()
    {
        return $this->hasMany(Question::class);
    }
}
