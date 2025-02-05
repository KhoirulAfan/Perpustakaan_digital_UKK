<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;

class adminUlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ulasan::with('user','buku')->paginate(10);
        return view('admin.ulasan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $buku = Buku::all();
        return view('admin.ulasan.create',compact('user','buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'buku_id' => 'required|integer',
            'ulasan' => 'required|max:255',
            'rating' => 'max_digits:2'
        ]);
        if(!$validated){
            return redirect()->back()->withErrors($validated)->withInput();
        }
        Ulasan::create($request->all());
        return redirect()->route('ulasan.index')->with('success','Berhasil menambahkan Ulasan');
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
        $data = Ulasan::with('user','buku')->findOrFail($id);
        $user = User::all();
        $buku = Buku::all();
        // dd($data);
        return view('admin.ulasan.edit',compact('data','user','buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Ulasan::with('user','buku')->findOrFail($id);
        $data->update($request->all());
        return redirect()->route('ulasan.index')->with('success','Berhasil mengubah data ulasan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Ulasan::with('user','buku')->findOrFail($id);
        $data->delete();
        return redirect()->route('ulasan.index')->with('success','Berhasil menhapus data ulasan');
    }
}
