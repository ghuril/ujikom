<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'berita');
        $kategori_id = $type == 'agenda' ? 3 : 2; // 3 untuk agenda, 2 untuk berita
        
        $posts = Post::where('kategori_id', $kategori_id)
                     ->latest()
                     ->get();
        
        return view('admin.posts.index', [
            'posts' => $posts,
            'type' => $type
        ]);
    }

    public function create()
    {
        $categories = Kategori::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Simpan ke folder uploads
            $file->move(public_path('uploads'), $filename);
            $data['gambar'] = 'uploads/' . $filename;
        }

        Post::create($data);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        $categories = Kategori::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($post->gambar && file_exists(public_path($post->gambar))) {
                unlink(public_path($post->gambar));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Simpan ke folder uploads
            $file->move(public_path('uploads'), $filename);
            $data['gambar'] = 'uploads/' . $filename;
        }

        $post->update($data);

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        // Hapus gambar jika ada
        if ($post->gambar && file_exists(public_path($post->gambar))) {
            unlink(public_path($post->gambar));
        }
        
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
