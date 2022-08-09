<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Komentar extends Authenticatable
{
    protected $table = 'komentar';
    public $fillable = [
            'artikel_id','id','email','tanggal'
        ];
    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
    public function komentarChild()
    {
        return $this->hasMany(KomentarChild::class);
    }
}
