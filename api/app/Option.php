<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'option',
        'courses_id'
    ];

    public function Question()
    {
        return $this->belongsTo(Question::class);
    }
}
