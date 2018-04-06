<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPlayerModel extends Model
{
    protected $table = 'statusplayer';
    protected $primaryKey = 'id_akun';

    protected $fillable = [
      'stamina', 'sanity'
    ];

    public function akun() {
      return $this->belongsTo('App\AkunModel','id_akun');
    }

}
