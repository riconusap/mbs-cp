<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TentangPerusahaan extends Authenticatable
{
    protected $table = 'data_tentang_perusahaan';
    public $fillable = [
            'nama_perusahaan','inisial_perusahaan','alamat_perusahaan','tentang_perusahaan','email_perusahaan','no_telp_perusahaan','logo_perusahaan'
        ];
}
