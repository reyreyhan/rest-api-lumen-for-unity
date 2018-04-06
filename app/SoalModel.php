<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalModel extends Model
{
    protected $table = 'soals';
    protected $primaryKey = 'id';

    protected $fillable = [
      'id_posisi', 'soal', 'A', 'B', 'C', 'D', 'soal', 'benar'
    ];

    protected $hidden = [
      'password'
    ];

    public function posisi() {
      return $this->belongsTo('App\PosisiModel','id_posisi');
    }

}
