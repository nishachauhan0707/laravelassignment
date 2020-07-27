<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'firstname', 'middlename', 'lastname','email', 'username', 'password','clientname', 'dob', 'address','country', 'state', 'pincode'
    ];
}
