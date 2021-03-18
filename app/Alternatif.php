<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    //
    protected $table='alternatif';
    protected $fillable=['id_pemain','id_kriteria','nilai'];

    public function getPemain(){
            return $this->belongsTo('App\Pemain', 'id_pemain', 'id');
    }
    
    public function getKriteria()
    {
        return $this->belongsTo('App\Kriteria', 'id_kriteria', 'id');
    }

    public function pemain(){
        return $this->belongsToMany('App\Pemain','nama');
    }
}
