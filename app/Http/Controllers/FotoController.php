<?php

namespace App\Http\Controllers;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = [
            [
                'id' => 1,
                'title' => 'Foto Upacara 1',
                'file' => 'assets/images/gallery/upacara1.jpg',
                'gallery' => 'Kegiatan Upacara'
            ],
            [
                'id' => 2,
                'title' => 'Foto Upacara 2',
                'file' => 'assets/images/gallery/upacara2.jpg',
                'gallery' => 'Kegiatan Upacara'
            ],
            // Tambahkan foto lainnya
        ];

        return view('admin.foto.index', compact('fotos'));
    }
} 