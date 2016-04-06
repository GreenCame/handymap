<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'firstname', 'lastname', 'pseudo', 'description', 'isActivateVoice', 'isActivateColor'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'isAdmin'
    ];

    public function isActivateVoice()
    {
        //
    }

    public
    function setInformation()
    {

    }

    public
    function removeUser()
    {

    }
}
