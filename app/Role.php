<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{

    protected $fillable = ['name','password_policy'];

    public function users(){
        return $this->hasMany('App\User');
    }

}
