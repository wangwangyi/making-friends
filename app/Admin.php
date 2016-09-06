<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
//use Zizaco\Entrust\Traits\EntrustUserTrait;
class Admin extends Authenticatable
{
    //use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role_user()
    {
        return $this->hasOne('App\Models\Role_user');
    }
}