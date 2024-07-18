<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $arsip = Arsip::when($query, function($queryBuilder) use ($query) {
                return $queryBuilder->where('nomor_surat', 'like', "%{$query}%")
                    ->orWhere('judul', 'like', "%{$query}%")
                    ->orWhereHas('kategori', function ($q) use ($query) {
                        $q->where('nama_kategori', 'like', "%{$query}%");
                    });
            })->paginate(5);

            return view('arsip_surat.tabel', compact('arsip'))->render();
        }

        $arsip = Arsip::paginate(5);
        return view('arsip_surat.index', compact('arsip'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('arsip_surat.create', compact('kategori'));
    }

    public function download(string $id)
    {
        $arsip = Arsip::find($id);
        return Storage::download($arsip->file_pdf);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message=[
            'unique'=>':attribute sudah digunakan',
            'required'=>':attribute tidak boleh kosong',            
            'mimes'=>':attribute harus berformat pdf',
            'max'=>':attribute harus berukuran kurang dari 2mb',
        ];                        
        $request->validate([
            'no_surat' => 'required|unique:arsip,nomor_surat',
            'kategori' => 'required',
            'judul' => 'required',
            'file_surat' => 'required|file|mimes:pdf|max:2048',
        ], $message);
        
        $arsip = new Arsip();

        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $fileName = $request->no_surat.'_'.$request->judul.'.pdf';
            $filePath = $file->storeAs('arsip', $fileName, 'public');
            $arsip->file_pdf = $filePath;
        }
        
        $arsip->nomor_surat = $request->no_surat;
        $arsip->id_kategori = $request->kategori;
        $arsip->judul = $request->judul;        
        $arsip->save();        

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('arsip_surat.show', compact('arsip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $arsip = Arsip::findOrFail($id);
        $kategori = Kategori::all();
        return view('arsip_surat.edit', compact('arsip', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message=[   
            'unique'=>':attribute sudah digunakan',         
            'required'=>':attribute tidak boleh kosong',            
            'mimes'=>':attribute harus berformat pdf',
            'max'=>':attribute harus berukuran kurang dari 2mb',
        ];                        
        $request->validate([
            'no_surat' => 'required|unique:arsip,nomor_surat,'. $id .',id_arsip',
            'kategori' => 'required',
            'judul' => 'required',
            'file_surat' => 'nullable|file|max:2048',
        ], $message);
        $arsip = Arsip::findOrFail($id);
        
        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $fileName = $request->no_surat . '_' . $request->judul.'.pdf';
            $filePath = $file->storeAs('arsip', $fileName, 'public');
            $arsip->file_pdf = $filePath;
        }
        
        $arsip->nomor_surat = $request->no_surat;
        $arsip->id_kategori = $request->kategori;
        $arsip->judul = $request->judul;        
        $arsip->update();        

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $arsip = Arsip::findOrFail($id);

        if (Storage::exists($arsip->file_pdf)) {
            Storage::delete($arsip->file_pdf);
            $arsip->delete();
        } else{
            $arsip->delete();
        }

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus');
    }
}
