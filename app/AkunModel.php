<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id';

    protected $fillable = [
      'username', 'email'
    ];

    protected $hidden = [
      'password'
    ];

    public function score() {
      return $this->belongsTo('App\ScoreModel','id');
    }

    public function statusplayer() {
      return $this->belongsTo('App\StatusPlayerModel','id');
    }

    public function posisi() {
      return $this->belongsTo('App\PosisiModel','id_posisi');
    }

}
