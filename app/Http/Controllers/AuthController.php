<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // autentikasi admin
    public function formLoginAdmin(){
        return view('auth.login_admin');
    }
    public function loginAdminProses(Request $request){        
        if(Auth::guard('admins')->attempt(['username' => $request->username,'password' => $request->password])){
            return redirect()->intended(route('admin.dashboard'));
        }else{
            return redirect()->back()->withErrors([
                'username' => 'username atau password salah'
            ])->withInput();

        }        
    }
    public function logoutAdmin(){
        Auth::guard('admins')->logout();                
        return redirect()->route('login.admin');
    }

    // autentikasi siswa


    public function formLoginSiswa(){
        return view('auth.login_peminjam');
    }
    public function formRegisterSiswa(){
        return view('auth.registers_peminjam');
    }
    public function registerSiswaProses(Request $request){
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'alamat' => 'required',
        ]);
        if(!$validated){
            return redirect()->back()->withErrors($validated)->withInput();            
        }
        User::create($request->all());
        return redirect()->route('login');
    }
    public function loginSiswaProses(Request $request){        
        // dd($request);
        if(Auth::guard('web')->attempt(['email' => $request->email,'password' => $request->password])){
            return redirect()->intended('/siswa/');
        }else{
            return redirect()->back()->withErrors([
                'email' => 'email atau password tidak sesuai'
            ])->withInput();

        }
    }
    public function logoutSiswa(){
        Auth::guard('web')->logout();                
        return redirect()->route('login');
    }    
}
