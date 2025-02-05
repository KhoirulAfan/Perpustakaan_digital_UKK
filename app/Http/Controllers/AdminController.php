<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Admin::paginate(10);
        // dd($data);
        return view('admin.petugas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::guard('admins')->user()->role !== 'admin'){
            return redirect()->route('petugas.index')->with('success','mohon fitur ini hanya dimiliki admin');
        }
        return view('admin.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::guard('admins')->user()->role !== 'admin'){
            return redirect()->route('petugas.index')->with('success','mohon fitur ini hanya dimiliki admin');
        }

        // masih error
        // dd($request);
        $validated = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        // dd($validated);
        if(!$validated){
            return redirect()->back()->withInput()->withErrors($validated);
        }
        Admin::create($request->all());
        return redirect()->route('petugas.index')->with('success','berhasil menambahkan data');

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
        $data = Admin::findOrFail($id);
        return view('admin.petugas.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Admin::findOrFail($id);
        $updated = $data->update([
            'nama' => $request->nama
        ]);
        if(!$updated){
            return redirect()->route('petugas.index')->with('error','gagal mengubah data');
        }else{
            return redirect()->route('petugas.index')->with('success','Berhasil mengubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Auth::guard('admins')->user()->role !== 'admin'){
            return redirect()->route('petugas.index')->with('success','mohon fitur ini hanya dimiliki admin');
        }
        $data = Admin::findOrFail($id);
        $deleted = $data->delete();
        if(!$deleted){
            return redirect()->route('petugas.index')->with('error','gagal mengubah data');
        }else{
            return redirect()->route('petugas.index')->with('success','Berhasil mengubah data');
        }
    }
}
