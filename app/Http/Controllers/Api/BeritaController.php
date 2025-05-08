<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getberita(){
        $data_berita = Berita::all();
        return response()->json([
            'data' => $data_berita,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'cover' => 'required',
            'tanggal' => 'required',
        ]);
        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('images/berita', $name);
            $berita->cover = $name;
        }
        $berita->tanggal = $request->tanggal;
        $berita->save();
        return response()->json([
            'data' => $berita,
            'success' => true,
            'message' => 'Berita berhasil ditambahkan',
        ]);



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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
