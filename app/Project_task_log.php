<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project_task_log extends Model
{
     use SoftDeletes;

     protected $fillable = [
        'action', 'project_task_id',
    ];

    protected $dates =['deleted_at'];


     public function project_tasks()
    {
        return $this->hasOne('App\Project_task');
    }
}
