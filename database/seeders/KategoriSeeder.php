<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Informasi',
            'Agenda',
            'Galeri',
            'Berita',
            'Pengumuman'
        ];

        foreach ($categories as $category) {
            Kategori::create([
                'judul' => $category,
                'slug' => Str::slug($category)
            ]);
        }
    }
}
