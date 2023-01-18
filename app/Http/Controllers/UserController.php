<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
            // disini saya membuat ketika misalnya input  nama nya kosong maka akan ada error dan peringatan
            // bahwa nama harus diisi/required
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $saved = $user->save();

        if($saved){
            return redirect('login')->back()->with('success', 'Pengguna Berhasil Di Daftarkan');
        }else{
            return redirect()->back()->with('fail', 'Pengguna Gagal Di Daftarkan');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('books');
            }else{
                return back()->with('fail', 'Password Anda Salah');
            }
        }else{
            return back()->with('fail', 'Email Anda Tidak Terdaftar');
        }
    }

    public function logoutUser(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

    public function index()
    {

        $userLogin = array();
        if(Session::has('loginId')){
            $userLogin = User::where('id', '=', Session::get('loginId'))->first();
        }

        $books = Library::get();
        return view('book', compact('books','userLogin'));
        // return disini akan mengembalikan tampilan ke views yaitu book.blade.php dan akan mengambilkan variabel book yang datanya di dapat dari model Library
    }

}
