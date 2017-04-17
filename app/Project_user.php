<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project_user extends Model
{
     use SoftDeletes;

    protected $dates =['deleted_at'];


 	 public function users()
    {
        return $this->hasOne('App\User');
    }

     public function projects()
    {
        return $this->hasOne('App\Project');
    }
}
