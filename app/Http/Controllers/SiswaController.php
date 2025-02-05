<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Favorit;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function daftarpeminjam(){
        $data = User::paginate(10);
        return view('admin.petugas2.index',compact('data'));
    }
    public function dashboard(){
        return view('siswa.dashboard');
    }
    public function buku(Request $request){
        $search = $request->search;
        if($search){
            $data = Buku::with('kategori')->where('judul','like',"%{$search}%")->paginate(10); 
        }else{
            $data = Buku::paginate(10);
        }
        return view('siswa.buku.index',compact('data','search'));
    }
    public function pinjam($bukuid){
        // dd($id);
        $id = Auth::guard('web')->user()->id;
        // dd($id);             

        $tanggal = date('Y-m-d');        
        $tambah = Peminjaman::create([
            'user_id' => $id,
            'buku_id' => $bukuid,
            'tanggal_pinjam' => $tanggal
        ]);
      
        return redirect()->route('siswa.daftar.buku')->with('success','Berhasil Meminjam Buku');
    }
    public function bukudipinjam(){
        $data = Peminjaman::with('buku','user')->where('user_id',Auth::guard('web')->user()->id)->where('status','pinjam')->get();
        // dd($data);
        return view('siswa.buku.bukupinjam',compact('data'));
    }
    public function historypinjam(){
        $data = Peminjaman::with('buku','user')->where('user_id',Auth::guard('web')->user()->id)->where('status','kembali')->get();
        // dd($data);
        return view('siswa.buku.historypinjam',compact('data'));
    }
    public function kembali($id){
        // dd($id);
        $data = Peminjaman::where('buku_id',$id)->where('status','pinjam')->first();
        // dd($data);
        $updated = $data->update([
            'status' => 'kembali',
            'tanggal_kembali' => date('Y-m-d'),
        ]);
        // dd($updated);
        return redirect()->route('siswa.pinjam.buku')->with('success','berhasil mengembalikan buku');
    }
    public function detailbuku($id){
        $data = Buku::with('kategori')->findOrFail($id);
        // dd($data);
        return view('siswa.buku.show',compact('data'));
    }
    public function bacabuku($id){
        $data = Buku::with('kategori')->findOrFail($id);
        // dd($data);
        return view('siswa.buku.baca',compact('data'));
    }
    public function toggle($bukuid){
        $userid = Auth::guard('web')->user()->id;
        $data = Favorit::with('user','buku')->where('user_id',$userid)->where('buku_id',$bukuid)->first();
        // dd($data);
        if(!$data){
            Favorit::create(['user_id' => $userid,'buku_id' => $bukuid]);
            return redirect()->back()->with('success','Berhasil Menambahkan Ke favorit');
        }else{
            $data->delete();
            return redirect()->back()->with('success','Berhasil Menghapus dari favorit');
        }
    }
    public function favorit(){
        $userid = Auth::guard('web')->user()->id;
        $data = Favorit::with('user','buku')->where('user_id',$userid)->get();
        // dd($data);
        return view('siswa.buku.favorit',compact('data'));
    }
    public function tambahulasan(Request $request, $bukuid = null){        
        $validated = $request->validate([
            'ulasan' => 'required|max:255',
            'rating' => 'required|integer|min:1|max:5'
        ]);
        if(!$validated){
            return redirect()->back()->withErrors($validated)->withInput();
        }        
        $rating = $request->rating;       
        $ulasan = $request->ulasan;
        $userid = Auth::guard('web')->user()->id;
        Ulasan::create([
            'user_id' => $userid,
            'rating' => $rating,
            'ulasan' => $ulasan,
            'buku_id' => $bukuid            
        ]);

        return redirect()->route('siswa.detail.buku',$bukuid)->with('success','berhasil menambahkan ulasan');
    }
    public function profile(){
        $data = Auth::guard('web')->user();
        // dd($data);
        return view('siswa.profile.index',compact('data'));
    }
}