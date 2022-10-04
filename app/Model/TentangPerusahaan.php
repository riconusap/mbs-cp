<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TentangPerusahaan extends Authenticatable
{
    protected $table = 'data_tentang_perusahaan';
    public $fillable = [
            'nama_perusahaan','inisial_perusahaan','alamat_perusahaan','tentang_perusahaan','email_perusahaan','no_telp_perusahaan','logo_perusahaan','alamat2_perusahaan','no_telp2_perusahaan'
        ];
    public function contact_perusahaan()
    {
        return $this->hasMany(ContactPerusahaan::class);
    }
}
