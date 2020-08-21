<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'permission'
    ];

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }
}
