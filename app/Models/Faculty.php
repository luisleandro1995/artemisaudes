<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Faculty extends Model
{
    
    protected $table = "faculties";
    
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
        return $this->hasMany('App\Models\Depedency');
    }
 
    }

