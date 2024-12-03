<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class City extends Model
{
    
    protected $table = "Cities";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',

    ];


    public function dependencies()
    {
        return $this->hasMany('App\Models\Dependency');
    }
 
    }

