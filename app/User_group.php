<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_group extends Model
{
     use SoftDeletes;

     protected $fillable = [
        'name',
    ];

    protected $dates =['deleted_at'];


  public function users()
    {
        return $this->belongsTo('App\User');
    }
}
