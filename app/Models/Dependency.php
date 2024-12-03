<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Dependency extends Model
{
    
    protected $table = "dependencies";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city_id',
        'faculty_id',

    ];


    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function faculty()
    {
        return $this->belongsTo('App\Models\Faculty');
    }

    public function forms()
    {
        return $this->hasMany('App\Models\Form');
    }
 
    }

