<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    //
    protected $table='kriteria';
   protected $fillable=['nama_kriteria','jenis_kriteria','bobot'];


   public function altKriteria(){
      return $this->hasMany('App\Alternatif','id_kriteria','id'); 
   }

   public function alternatif(){
       return $this->belongsToMany('App\Alternatif');
   }
  
}
