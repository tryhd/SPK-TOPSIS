<?php

namespace App\Http\Controllers;
use App\Detail;
use App\Kriteria;
use App\Bobot;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB; 
class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=DB::select("SELECT id,nama_kriteria,jenis_kriteria,bobot
        FROM kriteria
        /*WHERE bobot !=0*/");
        return view('detail.bobot',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriterias = Kriteria::all();
        $bobots = Bobot::all();
    
        return view('detail.tambah', compact('kriterias','bobots'));
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
        $this->validate($request,[
            'kriteria'=>'required',
            'bobot'=>'required'
       ]);
    
       $checkIfExists = Detail::where('id_kriteria', '=', $request->kriteria)->first();
       
       if(!$checkIfExists){
           $detailKriteria = new Detail;
           $detailKriteria->id_kriteria = $request->input('kriteria');
           $detailKriteria->id_bobot = $request->input('bobot');
           $detailKriteria->save();
           Session::flash('message', 'Data '. $detailKriteria->getKriteria->nama_kriteria .' berhasil ditambahkan');
            Session::flash('type', 'success');
           return redirect()->route('detail.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Detail::find($id);
        $kriterias = Kriteria::all();
        $bobots = Bobot::all();
        return view('detail.edit', compact('data','kriterias','bobots'));
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
       
       $this->validate($request,[
            'id_kriteria'=>'required',
            'bobot'=>'required'
       ]);
       $data=Detail::find($id);
       $data->id_kriteria = $request->id_kriteria;
       $data->id_bobot = $request->input('bobot');
       $data->save();
       Session::flash('message', 'Bobot '. $data->nama_kriteria .' berhasil ditambahkan');
       Session::flash('type', 'success');
       return redirect()->route('detail.index');
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
        
    }
}
