<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project_user_profile extends Model
{
     use SoftDeletes;

    protected $dates =['deleted_at'];

       protected $fillable = [
        'project_id', 'user_id',
    ];


 	 public function user_profiles()
    {
        return $this->hasOne('App\User_profile');
    }

     public function projects()
    {
        return $this->hasOne('App\Project');
    }
}
