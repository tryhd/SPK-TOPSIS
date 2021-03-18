<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Session;
use File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class userController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //dd($samples) ;
        $data_user = User::all();
        return view('user.index', compact('data_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_user = User::all();
        return view('user.tambah', compact('data_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function posttambah(Request $request){
        $this->validate($request,[
             'name'=>'required',
             'email'=>'required|unique:users|email',
             'password'=>'required|min:6',
             'role'=>'required',
             'phone'=>'required',
             'foto'=>'mimes:jpg,jpeg,png'
        ]);
        $foto=$request->File('foto');
         $nama_file=time()."_".$foto->getClientOriginalName();
         if ($request->hasFile('foto')){
            $path='images';
            $foto->move($path,$nama_file);
        }
         $data=User::create([
         'name'=>$request->name,
         'email'=>$request->email,
         'password'=>bcrypt($request->password),
         'role'=>$request->role,
         'foto'=>$nama_file,
         'phone'=>$request->phone
        ]);
        Session::flash('message', 'Data '. $data->name .' berhasil ditambahkan!');
        Session::flash('type', 'success');
        return redirect()->route('user.index');
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
        $data_user = User::find($id);
        return view('user.edit', compact('data_user'));
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
        //dd($request->all());
       /*$this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'role'=>'required',
            'phone'=>'required',
            'foto'=>'mimes:jpeg,jpg,png'
       ]);*/
        $data_user=User::find($id);
        $foto_user=$request->File('foto');
        $nama_file=time()."_".$foto_user->getClientOriginalName();
        if ($request->hasFile('foto')){
           $path='images';
           $foto_user->move($path,$nama_file);
       }
       $data_user->name=$request->name;
       $data_user->email=$request->email;
       $data_user->password=$request->password;
       $data_user->role=$request->role;
       $data_user->phone=$request->phone;
       $data_user->foto=$nama_file;
       $data_user->save();
       Session::flash('message', 'Data '. $data_user->name .' berhasil diubah!');
       Session::flash('type', 'success');
       return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_user = User::where('id',$id)->first();
        File::delete('/images',$data_user->foto);
        //data
        user::where('id',$id)->delete();
        return redirect()->route('user.index');
    }
}
