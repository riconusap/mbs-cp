<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ContactPerusahaan extends Authenticatable
{
    protected $table = 'contact_perusahaan';
    public $fillable = [
            'alamat','no_telp'
        ];
}
