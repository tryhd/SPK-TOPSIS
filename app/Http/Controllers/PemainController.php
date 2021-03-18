<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pemain;
use Session;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class PemainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data_pemain=Pemain::all();
        return view('pemain.index',compact('data_pemain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_pemain=Pemain::all();
        return view('pemain.tambah',compact('data_pemain'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'nama'=>'required',
           'posisi'=>'required',
           'nama_tim'=>'required',
           'foto'=>'mimes:jpg,jpeg,png',
           'tinggi'=>'required',
           'negara'=>'required'
       ]);
        $foto=$request->File('foto');
        $nama_file=time()."_".$foto->getClientOriginalName();
        if ($request->hasFile('foto')){
           $path='images/pemain';
           $foto->move($path,$nama_file);
        }
        $data_pemain=Pemain::create([
        'nama'=>$request->nama,
        'posisi'=>$request->posisi,
        'nama_tim'=>$request->nama_tim,
        'foto'=>$nama_file,
        'tinggi'=>$request->tinggi,
        'negara'=>$request->negara
       ]);
       Session::flash('message', 'Data '. $data_pemain->nama.' berhasil ditambahkan');
       Session::flash('type', 'success');
       return redirect()->route('pemain.index');
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
        $data_pemain= Pemain::find($id);
        return view('pemain.edit',compact('data_pemain'));
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
            'nama'=>'required',
            'posisi'=>'required',
            'nama_tim'=>'required',
            'foto'=>'mimes:jpeg,jpg,png,gif|required|max:10000',
            'tinggi'=>'required',
            'negara'=>'required'
        ]);
        $data_pemain=Pemain::find($id);
        $foto=$request->File('foto');
        $nama_file=time()."_".$foto->getClientOriginalName();
        if ($request->hasFile('foto')){
           $path='images/pemain';
           $foto->move($path,$nama_file);
       }
       $data_pemain->nama=$request->nama;
       $data_pemain->posisi=$request->posisi;
       $data_pemain->nama_tim=$request->nama_tim;
       $data_pemain->foto=$nama_file;
       $data_pemain->tinggi=$request->tinggi;
       $data_pemain->negara=$request->negara;
       $data_pemain->save();
       Session::flash('message', 'Data '. $data_pemain->nama.' berhasil diubah!');
       Session::flash('type', 'success');
       return redirect()->route('pemain.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pemain=Pemain::findorfail($id);
        $data_pemain->delete();
        return redirect()->route('pemain.index');
    }

}
