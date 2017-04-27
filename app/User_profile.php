<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_profile extends Model
{
     use SoftDeletes;

     protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'position',
        'gender', 'profile_picture', 'user_id',
    ];

    protected $dates =['deleted_at'];


 	 public function users()
    {
        return $this->hasOne('App\User');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }
}
