<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::with('kategori')->paginate(8);
        // return $data;
        return view('admin.buku.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        // dd($kategori);
        return view('admin.buku.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'sampul' => 'required|mimes:png,jpg,jpeg',
            'file' => 'mimes:pdf',            
            'judul' => 'required|unique:bukus,judul|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required|integer'
        ]);
        if(!$validated){
            return redirect()->back()->withInput()->withErrors($validated);
        }
        $create = [];
        $create = [
            'slug' => Str::slug($request->judul),
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori_id' => $request->kategori_id,
            'status' => 'tidak'
        ];
        if($request->file('sampul')){
            $sampulFile = $request->file('sampul');
            $sampulName = $sampulFile->hashName();
            Storage::disk('public')->putFileAs('sampul',$sampulFile,$sampulName);
            $create['sampul'] = $sampulName;
        }
        if($request->file('file')){
            $fileFile = $request->file('file');
            $fileName = $fileFile->hashName();
            Storage::disk('public')->putFileAs('file',$fileFile,$fileName);
            $create['file'] = $fileName;
        }
        
        Buku::create($create);
        return redirect()->route('buku.index')->with('success','berhasil menambahkan data');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Buku::with('kategori')->findOrFail($id);        
        return view('admin.buku.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::all();
        $data = Buku::findOrFail($id);        
        return view('admin.buku.edit',compact('data','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Buku::findOrFail($id);
        // dd($request);
        $validated = $request->validate([
            'sampul' => 'mimes:png,jpg,jpeg',
            'file' => 'mimes:pdf',            
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required|integer'
        ]);
        if(!$validated){
            return redirect()->back()->withInput()->withErrors($validated);
        }
        $update = [];
        $update = [
            'slug' => Str::slug($request->judul),
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori_id' => $request->kategori_id,
            'status' => $request->status
        ];
        if($request->file('sampul')){
            Storage::disk('public')->delete('sampul/'.$data->sampul);
            $sampulFile = $request->file('sampul');
            $sampulName = $sampulFile->hashName();
            Storage::disk('public')->putFileAs('sampul',$sampulFile,$sampulName);
            $update['sampul'] = $sampulName;
        }
        if($request->file('file')){
            Storage::disk('public')->delete('file/'.$data->file);
            $fileFile = $request->file('file');
            $fileName = $fileFile->hashName();
            Storage::disk('public')->putFileAs('file',$fileFile,$fileName);
            $update['file'] = $fileName;
        }
        
        $updated = $data->update($update);
        if(!$updated){
            return redirect()->route('buku.index')->with('error','gagal mengubah data');
        }else{
            return redirect()->route('buku.index')->with('success','Berhasil mengubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Buku::findOrFail($id);
        // dd($data);
        if($data->sampul){
            Storage::disk('public')->delete('sampul/'.$data->sampul);
        }
        if($data->file){
            Storage::disk('public')->delete('file/'.$data->file);
        }
        $deleted = $data->delete();
        if(!$deleted){
            return redirect()->route('buku.index')->with('error','gagal menghapus data');
        }else{
            return redirect()->route('buku.index')->with('success','Berhasil menghapus data');
        }
    }
}
