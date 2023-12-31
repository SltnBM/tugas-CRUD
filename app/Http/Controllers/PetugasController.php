<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $petugas = DB::table('petugas')->get();
        return view('petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         //validasi
         $request->validate([
            'nama_petugas'  => 'required|max:50',
            'jabatan_petugas'   => 'required|max:50',
            'no_telp_petugas'   => 'required|max:13',
            'alamat_petugas'   => 'required|max:100',
        ]);
        // simpan data ke tabel casts
        $query = DB::table('petugas')->insert([
            'nama_petugas'  => $request['nama_petugas'],
            'jabatan_petugas'  => $request['jabatan_petugas'],
            'no_telp_petugas'   => $request['no_telp_petugas'],
            'alamat_petugas'   => $request['alamat_petugas'],
        ]);
        // kalo udh kesimpan di redirect ke list data/index
        return redirect()->route('petugas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $petugas = DB::table('petugas')->where('id', $id)->get();
        return view('petugas.show', compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $petugas = DB::table('petugas')->where('id', $id)->get();
        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //
         //validasi
         $request->validate([
            'nama_petugas'  => 'required|max:50',
            'jabatan_petugas'   => 'required|max:50',
            'no_telp_petugas'   => 'required|max:13',
            'alamat_petugas'   => 'required|max:100',
        ]);
        // simpan data ke tabel casts
        $query = DB::table('petugas')->where('id', $id)->update([
            'nama_petugas'  => $request['nama_petugas'],
            'jabatan_petugas'  => $request['jabatan_petugas'],
            'no_telp_petugas'   => $request['no_telp_petugas'],
            'alamat_petugas'   => $request['alamat_petugas'],
        ]);
        // kalo udh kesimpan di redirect ke list data/index
        return redirect()->route('petugas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = DB::table('petugas')->where('id', $id)->delete();
        return redirect()->route('petugas.index');
    }
}
