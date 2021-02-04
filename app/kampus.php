<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;


class kampus extends Model implements AuthenticatableContract
{

    use Authenticatable;
    public $timestamps=false;
    protected $table ='kampus';
    protected $guard ='kampus';

    protected $fillable =[
        'username','password','role',
    ];

    protected $primarykey='ID_KAMPUS';
}
