<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(){
        return view('login');
    }

    public function postLogin(Request $request){
       if(!\Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->back();
       }
       return redirect()->route('home');
    }

    public function tambah(){
        return view ('add');
    }

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
        User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'role'=>$request->role,
        'foto'=>$nama_file,
        'phone'=>$request->phone
       ]);
       return redirect()->route('user.index');
    }

    public function logout(){
        \Auth::logout();
        return redirect()->route('login');
    }
}
