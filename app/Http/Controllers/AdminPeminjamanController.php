<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Peminjaman::with('user','buku')->paginate(8);
        // dd($data);
        return view('admin.peminjaman.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $buku = Buku::all();
        return view('admin.peminjaman.create',compact('user','buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'buku_id' => 'required|integer'
        ]);
        if(!$validated){
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $tanggal = date('Y-m-d');        
        $tambah = Peminjaman::create([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $tanggal
        ]);
        if(!$tambah){
            return redirect()->route('peminjaman.index')->with('error','Gagal menambahkan data');
        }
        return redirect()->route('peminjaman.index')->with('success','Berhasil Menambahkan Data Peminjaman');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $data = Peminjaman::findOrFail($id);        
        $user = User::all();
        $buku = Buku::all();        
        return view('admin.peminjaman.edit',compact('user','buku','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Peminjaman::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'buku_id' => 'required|integer'
        ]);
        if(!$validated){
            return redirect()->back()->withErrors($validated)->withInput();
        }
           
        $updated = $data->update([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
            
        ]);
        if(!$updated){
            return redirect()->route('peminjaman.index')->with('error','Gagal mengubah data peminjaman');
        }
        return redirect()->route('peminjaman.index')->with('success','Berhasil mengubah Data Peminjaman');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Peminjaman::findOrFail($id);
        $deleted = $data->delete();
        if(!$deleted){
            return redirect()->route('peminjaman.index')->with('error','gagal menghapus data');
        }
        return redirect()->route('peminjaman.index')->with('success','berhasil menghapus data');
    }
    public function kembali($id){
        $data = Peminjaman::findOrFail($id);
        $data->update([
            'status' => 'kembali',
            'tanggal_kembali' => date('Y-m-d'),
        ]);
        return redirect()->route('peminjaman.index')->with('success','Berhasil Mengembalikan Buku');
    }
    public function laporanForm(){
        // return 'cihuy';
        return view('admin.peminjaman.formlaporan');
    }
    public function laporanProses(Request $request){
        $tgl1 = $request->tanggal1;
        $tgl2 = $request->tanggal2;

        $sql = Peminjaman::with('user','buku')->whereBetween('created_at',[$tgl1,$tgl2]);
        if($request->status !== 'semua'){
            $sql->where('status',$request->status);            
        }
        $data = $sql->get();
        return view('admin.peminjaman.laporan',compact('data','tgl1','tgl2'));
    }
    public function laporanDownloadForm(){
        // return 'cihuy';
        return view('admin.peminjaman.formlaporandownload');
    }
    public function laporanDownloadProses(Request $request){
        $tgl1 = $request->tanggal1;
        $tgl2 = $request->tanggal2;
        $status = $request->status;
        $sql = Peminjaman::with('user','buku')->whereBetween('created_at',[$tgl1,$tgl2]);
        if($status !== 'semua'){
            $sql->where('status',$status);            
        }
        
        $data = $sql->get();
        return view('admin.peminjaman.laporandownload',compact('data','tgl1','tgl2','status'));
    }
}
