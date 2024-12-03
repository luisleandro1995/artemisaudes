<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = "users";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'document_type',
        'document_number',
        'email',
        'password',
        'state',
        'user_type_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function user_type()
    {
        return $this->belongsTo('App\Models\UserType');
    }

    public function workspaces()
    {
        return $this->hasMany('App\Models\WorkSpace');
    }

    public function forms()
    {
        return $this->hasMany('App\Models\Form');
    }
 
 
 
    }

