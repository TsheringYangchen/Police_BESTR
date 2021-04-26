<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    protected $table='bins';
    public $timestamps = false;
    protected $fillable=['license_no', 'license_name', 'cid', 'violation_date', 'image'];
    
}
