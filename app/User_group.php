<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User_group extends Authenticatable
{
     use SoftDeletes;

     protected $fillable = [
        'usertype',
    ];

    protected $dates =['deleted_at'];


  public function users()
    {
        return $this->belongsTo('App\User');
    }
}
