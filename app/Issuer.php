<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issuer extends Model
{
    
    protected $fillable = ['provider_name','cid','designation','phone','email','password','confirm_password'];
}
