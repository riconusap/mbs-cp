<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class MasterJabatan extends Authenticatable
{
    protected $table = 'master_jabatan';
    public $fillable = [
            'nama_jabatan'
        ];
        public function pegawaijabatan()
        {
            return $this->hasMany(Pegawai::class);
        }
}
