<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreModel extends Model
{
    protected $table = 'score';
    protected $primaryKey = 'id_akun';

    protected $fillable = [
      'score', 'id_posisi'
    ];

    public function akun() {
      return $this->belongsTo('App\AkunModel','id_akun');
    }

    public function posisi() {
      return $this->belongsTo('App\PosisiModel','id_posisi');
    }

}
