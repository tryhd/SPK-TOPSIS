<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemain;
use App\Kriteria;
use App\Alternatif;
use App\User;
use DB;
class HomeController extends Controller
{
    //
    public function index(){
        $total_pemain=Pemain::all()->count();
        $kriteriat=Kriteria::all()->count();
        $user=User::all()->count();
        $alternatift=DB::select("SELECT DISTINCT a.id_pemain
        FROM pemain p
        JOIN alternatif a
        WHERE p.id=a.id_pemain");
       
       $alternatif=Alternatif::get();
       $pemain=Pemain::get();
       $kriteria=Kriteria::get();
       $sql=DB::select("SELECT p.nama,p.nama_tim,p.posisi, b.nama_kriteria,b.bobot,a.nilai,b.jenis_kriteria
       FROM 
           alternatif a
       JOIN 
           pemain p ON a.id_pemain=p.id
       JOIN 
           kriteria b ON a.id_kriteria=b.id
       ");
       
       $data=array();
       $kriterias=array();
       $bobot=array();
       $bobotxkriteria=array();
       $nilai_kuadrat=array();
       $jenis=array();
       
       // solusi ideal
       $ypos=array();
       $yneg=array();
       
       // Jarak
       $dpos=array();
       $dneg=array();
       $dposnormal=array();
       $dnegnormal=array();

       //peferensi dan pengurutan
       $v_akhir=array();
       $urut=array();

       //var_dump($sql);
       foreach($sql as $row){
           if(!isset($data[$row->nama])){
               $data[$row->nama]=array();
           }
           if(!isset($data[$row->nama][$row->nama_kriteria])){
               $data[$row->nama][$row->nama_kriteria]=array();
           }
           if(!isset($nilai_kuadrat[$row->nama_kriteria])){
               $nilai_kuadrat[$row->nama_kriteria]=0;
           }   
           $bobot[$row->nama_kriteria]=$row->bobot;
           $data[$row->nama][$row->nama_kriteria]=$row->nilai;
           $nilai_kuadrat[$row->nama_kriteria]+=pow($row->nilai,4);
           $kriterias[]=$row->nama_kriteria;
           $jenis[$row->nama_kriteria]=$row->jenis_kriteria;
        }
       
       $namakriteria=array_unique($kriterias);
       $jumlah_kriteria=count($kriteria);
       
       $index=0;
       $x=1;
       $normalisai=[];
       foreach($data as $nama=>$krit){
           foreach($namakriteria as $k){
               //normalisasi       
               if($krit[$k]>0 && $nilai_kuadrat[$k]>0){
                   $normalisasi[$k][$index] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])),4);
               }    
               else{
                   $normalisasi[$k][$index]=0;
               }
               //normalisasi terbobot
               $bobotxkriteria[$k][$index] =$normalisasi[$k][$index]*$bobot[$k];
               //ideal positif
               $ypos[$k]=($jenis[$k]=='Benefit'?max($bobotxkriteria[$k]) :min($bobotxkriteria[$k]));
               //ideal negatif
               $yneg[$k]=($jenis[$k]=='Cost'?max($bobotxkriteria[$k]):min($bobotxkriteria[$k]));
           }
           $index++;
       }
       //dd($normalisai,$bobotxkriteria,$yneg,$ypos);
       $index=0;
       //Jarak Solusi Ideal
       foreach($data as $nama=>$krit){
           foreach($namakriteria as $k){
               if(!isset($dpos[$index])){
                   $dpos[$index]=0;
               }
                   $dpos[$index]+=pow($ypos[$k]-$bobotxkriteria[$k][$index],4);
               if(!isset($dneg[$index])){
                   $dneg[$index]=0;
               }
                   $dneg[$index]+=pow($yneg[$k]-$bobotxkriteria[$k][$index],4);
           }
           $dposnormal[$index]=round(sqrt($dpos[$index]),4);
           $dnegnormal[$index]=round(sqrt($dneg[$index]),4);
           //preferensi
           $v_akhir[$index] = round($dnegnormal[$index] / ($dposnormal[$index] + $dnegnormal[$index]),4);
           $index++;            
           $preferensi[]=$v_akhir;
       }
       //pengurutan rekomendasi
       $i=0;
       $V=array();
       $Y=array();
       $Z=array();
       $hasil=array();
       $label=array();
       $nama_alt = array();
       $club=array();
       $vi=array();
       foreach($data as $nama=>$krit){
           $i = $i +1;
           array_push($nama_alt,$nama);
           $n = "A" . $i;
           array_push($label,$n);
           foreach($kriteria as $k){
               $V[$i-1]=$v_akhir[$i-1];
           }
       }
       $tmp=array();
       $vi=$V;
       $panjang=count($label);
       for($i=0; $i <$panjang; $i++){
           array_push($tmp,array($label[$i],$nama_alt[$i],$vi[$i],$dnegnormal[$i],$dposnormal[$i]));
       }
       array_multisort(array_map(function($element){
           return $element[2];
       },$tmp),SORT_DESC,$tmp);
       $urut=count($tmp);
       
       return view('home',compact('total_pemain','kriteriat','alternatift','user','data','v_akhir','index','nama_alt','preferensi'));
    }
}
