<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class WorkSpace extends Model
{
    
    protected $table = "work_spaces";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',

    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

 
    }

