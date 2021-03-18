<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $table='detail_kriteria';
    protected $fillable=['id_kriteria','id_bobot'];
    
    public function getKriteria(){
        return $this->belongsTo('App\Kriteria', 'id_kriteria', 'id');
    }

    public function getBobot(){
        return $this->belongsTo('App\Bobot', 'id_bobot', 'id');
    }
    public function detailAlternatif()
    {
        return $this->hasMany('App\Alternatif', 'id_kriteria', 'id');
    }

    public function getPemain()
    {
            return $this->belongsToMany('App\Pemain');
    }
}
