<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;
use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class GaleryController extends Controller
{
    public function index()
    {
        $posts = Galery::where('kategori_id', 1)
            ->latest()
            ->get();
        
        return view('admin.galeri.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);

                Galery::create([
                    'judul' => $request->judul,
                    'isi' => $request->isi,
                    'gambar' => 'uploads/' . $filename,
                    'kategori_id' => 1 // kategori galeri
                ]);

                return redirect()->route('galeri.index')
                    ->with('success', 'Gallery created successfully');
            }
        } catch (\Exception $e) {
            Log::error('Gallery Upload Error: ' . $e->getMessage());
            return back()->with('error', 'Error uploading image: ' . $e->getMessage());
        }

        return back()->with('error', 'No image uploaded');
    }

    public function edit($id)
    {
        $post = Galery::findOrFail($id); // Pastikan model sesuai
        return view('admin.galeri.edit', compact('post'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $post = Galery::findOrFail($id);
        $post->judul = $request->judul;
    
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($post->gambar && file_exists(public_path($post->gambar))) {
                unlink(public_path($post->gambar));
            }
    
            // Simpan gambar baru
            $imagePath = $request->file('gambar')->store('uploads/galeri', 'public');
            $post->gambar = '/storage/' . $imagePath;
        }
    
        $post->save();
    
        return redirect()->route('galeri.index')->with('success', 'Gallery updated successfully.');
    }
    


    public function destroy($id)
    {
        $post = Galery::findOrFail($id);
        
        // Hapus file gambar
        if (file_exists(public_path($post->gambar))) {
            unlink(public_path($post->gambar));
        }
        
        $post->delete();

        return redirect()->route('galeri.index')
            ->with('success', 'Gallery deleted successfully');
    }
} 