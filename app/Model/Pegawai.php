<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Authenticatable
{
    protected $table = 'pegawai';
    public $fillable = [
            'nama','jabatan_id','nip','foto','tempat_lahir','tanggal_lahir','no_telp','jenis_kelamin','deskripsi'
        ];
    public function jabatan()
    {
        return $this->belongsTo(MasterJabatan::class);
    }
}
