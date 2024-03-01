<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function show(){
        $data['users']=User::all();
        return view('administrasi.users.users', $data);
    }

    public function search(Request $req){
        $data['users']=User::where('name', 'like', "%{$req->search}%")->orWhere('username', 'like', "%{$req->search}%")->get();
        return view('administrasi.users.users', $data);
    }

    public function view($id){
        $data['users']=User::find($id);
        return view('administrasi.users.user_profile', $data);
    }

    public function add(Request $req){
        $filename=$req->foto->getClientOriginalName();
        $data=[
            'name'=>$req->name,
            'username'=>$req->username,
            'password'=>$req->password,
            'address'=>$req->address,
            'phone'=>$req->phone,
            'level'=>$req->level,
            'foto'=>$req->file('foto')->storeAs($filename)
        ];

        $validasi=User::where('username', $req->username)->first();

        if(!$validasi){
            User::create($data);
        }else{
            return back()->withErrors('Username sudah digunakan!')->withInput();
        }

        return redirect('/users');
    }

    public function change(Request $req){

        // Verifikasi Foto
        $data=User::where('id', $req->id)->first();
        if($req->foto==''){
            $foto=$data->foto;
        }else{
            $filename=$req->foto->getClientOriginalName();
            $foto=$req->file('foto')->storeAs($filename);
        }

        // Verifikasi Password
        if(!empty($req->password)){
            $password=bcrypt($req->password);
        }else{
            $password=$data->password;
        }

        User::where('id', $req->id)->update([
            'name'=>$req->name,
            'username'=>$req->username,
            'password'=>$password,
            'address'=>$req->address,
            'phone'=>$req->phone,
            'level'=>$req->level,
            'foto'=>$foto
        ]);
        return redirect('/users');
    }

    public function remove($id){
        User::find($id)->delete();
        return redirect('/users');
    }
}
