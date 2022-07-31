<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    protected $table = 'data_client';
    public $fillable = [
            'nama_client','logo'
        ];
}
