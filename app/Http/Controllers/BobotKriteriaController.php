<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use Session;
use Illuminate\Support\Facades\DB; 
class BobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select("SELECT id,nama_kriteria,jenis_kriteria,bobot
        FROM kriteria");
        return view('bobotkriteria.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data=Kriteria::find($id);
        return view('bobotkriteria.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_kriteria'=>'required',
            'jenis_kriteria'=>'required',
            'bobot'=>'required'
       ]);
        $data=Kriteria::find($id);
        $data->nama_kriteria=$request->nama_kriteria;
        $data->jenis_kriteria=$request->jenis_kriteria;
        $data->bobot=$request->bobot;
        $data->save();
        Session::flash('message', 'Bobot '. $data->nama_kriteria .' berhasil ditambahkan');
        Session::flash('type', 'success');
        return redirect()->route('bobotkriteria.index');
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
