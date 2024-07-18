<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $kategori = Kategori::when($query, function($queryBuilder) use ($query) {
                return $queryBuilder->where('nama_kategori', 'like', "%{$query}%")
                    ->orWhere('keterangan', 'like', "%{$query}%");                    
            })->paginate(5);

            return view('kategori.tabel', compact('kategori'))->render();
        }
        $kategori = Kategori::paginate(5);
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message=[
            'unique'=>':attribute sudah digunakan',
            'required'=>':attribute tidak boleh kosong',            
        ];                        
        $request->validate([
            'nama_kategori' => 'required|unique:kategori',
            'keterangan' => 'required',            
        ], $message);

        $kategori = new Kategori();

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->keterangan = $request->keterangan;

        $kategori->save();

        return redirect()->route('kategori.index')->with('success','Kategori berhasil ditambahkan');
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
        $kategori = Kategori::find($id);
        
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message=[
            'unique'=>':attribute sudah digunakan',
            'required'=>':attribute tidak boleh kosong',            
        ];                        
        $request->validate([
            'nama_kategori' => 'required|unique:kategori,nama_kategori,'. $id . ',id_kategori',
            'keterangan' => 'required',            
        ], $message);

        $kategori = Kategori::find($id);

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->keterangan = $request->keterangan;
        $kategori->update();
        
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id)->delete();
        return redirect()->route('kategori.index')->with('success','Kategori berhasil dihapus');
    }
}
