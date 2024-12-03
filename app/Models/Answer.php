<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends MOdel
{
    
    protected $table = "answers";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'text',
        'form_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function form()
    {
        return $this->belongsTo('App\Models\Form');
    }

 
    }

