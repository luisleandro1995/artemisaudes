<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Form extends Model
{
    
    protected $table = "forms";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'publication_date',
        'end_date',
        'state',
        'habeas_data',
        'user_id',
        'dependency_id',
        'work_space_id',

    ];




    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function dependency()
    {
        return $this->belongsTo('App\Models\Dependency');
    }

    public function workspace()
    {
        return $this->belongsTo('App\Models\WorkSpace');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }



 
    }

