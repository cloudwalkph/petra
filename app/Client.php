<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

     protected $fillable = [
        'client_name',
    ];

    protected $dates =['deleted_at'];


  public function projects()
    {
        return $this->belongsTo('App\Project');
    }
}
