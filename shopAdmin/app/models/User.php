<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    //protected $table = 'User';
    protected $fillable = ['UserName', 'Passwd'];
}
