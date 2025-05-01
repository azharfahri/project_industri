<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $berita = berita::all();
        return view('berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('berita.create');
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

        return redirect()->route('berita.index')->with('success','Data Berhasil Ditambahkan');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita = berita::all();
        return view('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita =berita::FindOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'cover' => 'required',
            'tanggal' => 'required',
        ]);
        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        if ($request->hasFile('cover')) {
            $berita->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/berita', $name);
            $berita->cover = $name;
        }
        $berita->tanggal = $request->tanggal;
        $berita->save();

        return redirect()->route('berita.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('berita.index')->with('success','Data Berhasil Dihapus');
    }
}
