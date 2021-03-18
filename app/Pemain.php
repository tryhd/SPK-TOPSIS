<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    protected $table='pemain';
    protected $fillable =['nama','posisi','nama_tim','foto','tinggi','negara'];

    public function getAlternatif()
    {
        return $this->hasMany('App\Alternatif', 'id_pemain', 'id');
    }

    public function kriteria()
    {
        return $this->belongsToMany('App\Kriteria');
    }

}
