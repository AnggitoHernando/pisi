<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaUKM extends Model
{
    public $timestamps=false;
    protected $table ='anggota_ukm';

    protected $primarykey='ID_ANGGOTA';
}
