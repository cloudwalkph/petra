<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
      use SoftDeletes;

     protected $fillable = [
        'name', 'description', 'start_date', 'estimated_deadline',
    ];

    protected $dates =['deleted_at'];


 	 public function project_users()
    {
        return $this->belongsTo('App\Project_user');
    }

     public function project_tasks()
    {
        return $this->belongsTo('App\Project_task');
    }
}
