<?php

namespace App\Model;

use App\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Artikel extends Authenticatable
{
    protected $table = 'artikel';
    public $fillable = [
            'judul',
            'slug',
            'isi',
            'img',
            'tanggal',
            'penulis',
            'summary',
            'kategori_artikel',
        ];
    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
    public function author()
    {
        return $this->hasOne(User::class, 'id','penulis');
    }
    public function kategori()
    {
        return $this->hasOne(MasterKategori::class, 'id','master_kategori_id');
    }
}
