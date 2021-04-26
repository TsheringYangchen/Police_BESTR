<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $fillable = ['license_no','license_name','cid','phone','location','license_type','image'];
}
