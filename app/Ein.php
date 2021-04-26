<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ein extends Model
{
    protected $table='eins';
    public $timestamps = false;
    protected $fillable=['license_no', 'license_name', 'cid', 'violation_date', 'image'];
}
