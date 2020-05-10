<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
