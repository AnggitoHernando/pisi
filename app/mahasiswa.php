<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;


class mahasiswa extends Model implements AuthenticatableContract
{
    use Authenticatable;
    public $timestamps=false;
    protected $table ='mahasiswa';
    protected $guard ='mahasiswa';

    protected $primarykey='NIM';
}
