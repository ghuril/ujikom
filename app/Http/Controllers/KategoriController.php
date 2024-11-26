<?php

namespace App\Http\Controllers;

class KategoriController extends Controller
{
    public function index()
    {
        $categories = [
            [
                'id' => 1,
                'nama' => 'Galeri',
                'slug' => 'galeri',
                'posts_count' => 5,
                'description' => 'Dokumentasi kegiatan sekolah dalam bentuk foto dan video'
            ],
            [
                'id' => 2,
                'nama' => 'Berita',
                'slug' => 'berita',
                'posts_count' => 8,
                'description' => 'Informasi terkini seputar kegiatan dan prestasi sekolah'
            ],
            [
                'id' => 3,
                'nama' => 'Agenda',
                'slug' => 'agenda',
                'posts_count' => 3,
                'description' => 'Jadwal dan agenda kegiatan yang akan datang'
            ]
        ];

        return view('admin.kategori.index', compact('categories'));
    }
}
