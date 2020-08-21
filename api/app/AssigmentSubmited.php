<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssigmentSubmited extends Model
{
    protected $fillable = [
        'file',
        'assigment_id',
        'user_id',
        'submited_at'
    ];

    public function Assigment()
    {
        return $this->belongsTo(Assigment::class);
    }

    public function User()
    {
        return $this->belongsTo(user::class);
    }
}
