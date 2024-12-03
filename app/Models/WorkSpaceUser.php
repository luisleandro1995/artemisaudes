<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class WorkSpaceUser extends Model
{
    
    protected $table = "work_space_user";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'work_space_id',

    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    
    public function workspace()
    {
        return $this->belongsTo('App\Models\Workspace');
    }


 
    }

