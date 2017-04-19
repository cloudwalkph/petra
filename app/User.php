<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password', 'user_group_id', 'user_group_id',
    ];

    protected $dates=['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_groups()
    {
        return $this->hasMany('App\User_group');
    }

    public function user_profiles()
    {
        return $this->belongsTo('App\User_profile');
    }

      public function project_users()
    {
        return $this->belongsTo('App\Project_user');
    }
}
