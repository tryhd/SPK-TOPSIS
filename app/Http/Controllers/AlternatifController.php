<?php

namespace App\Http\Controllers;
use App\Detail;
use App\Pemain;
use App\Kriteria;
use App\Alternatif;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kriterias=Kriteria::get();
        $al=Alternatif::all();
        $pemains=Pemain::all();
        // dd($kriterias, $al, $data);
        /*foreach($data as $row){
        $data[$row->nama]=Alternatif::where('id_pemain',$row->id)->get();
        }*/
        /*$data = DB::table('pemain')
            ->join('alternatif', 'pemain.id', '=', 'alternatif.id_pemain')
            ->select('pemain.*')
            ->get();*/
        $data=DB::select("SELECT DISTINCT p.id,p.nama,p.nama_tim,p.posisi,p.foto,a.id_pemain
        FROM alternatif a
        JOIN kriteria k
        JOIN
        pemain p
        WHERE a.id_pemain=p.id AND a.id_kriteria=k.id
        ");
        return view('Alternatif.index',compact('pemains','kriterias','data','al'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pemains=Pemain::all();
        $kriterias=Kriteria::all();
        return view('alternatif.tambah',compact('pemains','kriterias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $kriterias=Kriteria::get();
        $this->validate($request,[
            'pemain'=>'required',
            'str_replace'=>'required'
        ]);
        $checkIfExists = Alternatif::where('id_pemain', '=', $request->pemain)->first();
        if(!$checkIfExists){
            foreach($kriterias as $k){
                $data=new Alternatif;
                $nil=str_replace('','',$k->id);
                $data->id_pemain=$request->input('pemain');
                $data->id_kriteria=$k->id;
                $data->nilai=$request->$nil;
                $data->save();
                Session::flash('message', 'Data '. $data->getPemain->nama .' berhasil ditambahkan sebagai alternatif!');
                Session::flash('type', 'success');
                }
                return redirect()->route('alternatif.index');
        }else{
            Session::flash('message', 'Gagal menambahkan data karena sudah ada');
            Session::flash('type', 'danger');
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pemians=Pemain::find($id);
        $kriterias=Kriteria::get();
        return view('alternatif.detail',compact('pemains','kriterias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pemains=Pemain::get();
        $kriterias=Kriteria::get();
        $data = Alternatif::find($id);
        return view('alternatif.edit',compact('data','kriterias','pemains'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $pemains=Pemain::find($id);
        $data=Alternatif::where('id_pemain',$id)->get();
        $data->id_pemain->$request->id_pemain;
        $data->nilai->$request->nilai;
        $data->save();
        dd($request->all());
        return redirect()->route('alternatif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Alternatif::where('id_pemain',$id)->Delete();
        return redirect()->route('alternatif.index');
    }
}
