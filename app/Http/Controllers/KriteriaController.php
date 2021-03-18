<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Kriteria;
class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=kriteria::all();
        return view('kriteria.index',compact('data'));
    }

    public function bobotKriteria()
    {
       
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
        //
        $data=Kriteria::find($id);
        return view('kriteria.edit',compact('data'));
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
        //
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
        $data=Kriteria::find($id);
        $data->delete('bobot');
        return redirect()->route('kriteria.index');
    }
}
