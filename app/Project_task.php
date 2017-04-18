<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project_task extends Model
{
     use SoftDeletes;

     protected $fillable = [
        'complexity', 'deadline', 'project_id', 'user_id',
    ];

    protected $dates =['deleted_at'];


 	 public function projects()
    {
        return $this->hasOne('App\Project');
    }

     public function users()
    {
        return $this->hasMany('App\User');
    }

      public function project_task_logs()
    {
        return $this->belongsTo('App\Project_task_log');
    }
}
