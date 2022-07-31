<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class MasterKategori extends Authenticatable
{
    protected $table = 'master_kategori';
    public $fillable = [
            'kategori','status'
        ];
}
