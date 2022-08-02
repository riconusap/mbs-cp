<?php

namespace App\Model;

use App\Model\Komentar as ModelKomentar;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KomentarChild extends Authenticatable
{
    protected $table = 'komentar_child';
    public $fillable = [
            'komentar_id','isi_komentar','email','tanggal'
        ];
    public function komentar_parent()
    {
        return $this->hasOne(ModelKomentar::class);
    }
}
