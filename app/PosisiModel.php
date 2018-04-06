<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosisiModel extends Model
{
    protected $table = 'posisi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama'
    ];

    public function soal() {
      return $this->hasMany('App\SoalModel','id');
    }

    public function akun() {
      return $this->hasMany('App\PosisiModel','id');
    }

}
