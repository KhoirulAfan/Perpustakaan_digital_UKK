<?php

namespace App\Http\Controllers;

use App\Models\KategorBuku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminKategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::paginate(10);
        // dd($data);
        return view('admin.kategori.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'nama' => 'required|min:2'
        ],[
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Nama harus ada minimal 2 huruf'
        ]);
        if(!$validated){
            return redirect()->back()->withInput()->withErrors($validated);
        }
        Kategori::create([
            'nama' => $request->nama
        ]);
        return redirect()->route('kategori.index')->with('success','berhasil menambahkan data');

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
        $data = Kategori::findOrFail($id);
        return view('admin.kategori.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Kategori::findOrFail($id);
        $updated = $data->update([
            'nama' => $request->nama
        ]);
        if(!$updated){
            return redirect()->route('kategori.index')->with('error','gagal mengubah data');
        }else{
            return redirect()->route('kategori.index')->with('success','Berhasil mengubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kategori::findOrFail($id);
        $deleted = $data->delete();
        if(!$deleted){
            return redirect()->route('kategori.index')->with('error','gagal mengubah data');
        }else{
            return redirect()->route('kategori.index')->with('success','Berhasil mengubah data');
        }
    }
}
