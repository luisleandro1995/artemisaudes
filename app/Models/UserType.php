<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class UserType extends Model
{
    
    protected $table = "user_types";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'level',

    ];


    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
 
    }

