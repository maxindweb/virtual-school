<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = 
    [
        'Role'
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }

    public function Permission()
    {
        return $this->hasMany(Permission::class);
    }
}
