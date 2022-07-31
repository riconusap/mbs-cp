<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ExpertiseContent extends Authenticatable
{
    protected $table = 'setting_expertise';
    public $fillable = [
            'expertise','img','deskripsi'
        ];
}

