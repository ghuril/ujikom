<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Galery;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $statistics = [
            'berita' => Post::where('kategori_id', 2)->count(),
            'agenda' => Post::where('kategori_id', 3)->count(),
            'galeri' => Galery::count(),
        ];

        $recent_posts = [
            'berita' => Post::where('kategori_id', 2)->latest()->take(5)->get(),
            'agenda' => Post::where('kategori_id', 3)->latest()->take(5)->get(),
        ];

        return view('admin.dashboard.index', compact('statistics', 'recent_posts'));
    }

    public function preview()
    {
        $berita = Post::where('kategori_id', 2)
            ->latest()
            ->take(3)
            ->get();
            
        $agenda = Post::where('kategori_id', 3)
            ->latest()
            ->take(3)
            ->get();
            
        $galeri = Galery::where('kategori_id', 1)
            ->latest()
            ->take(6)
            ->get();

        $achievements = [
            'students' => '1000+',
            'teachers' => '100+',
            'graduates' => '5000+',
            'partners' => '50+'
        ];

        $programs = [
            [
                'name' => 'Pengembangan Perangkat Lunak dan Gim',
                'description' => 'Program keahlian yang mempelajari tentang pemrograman, pengembangan aplikasi, database, dan pengembangan game.',
                'image' => '/assets/images/pplg.png'
            ],
            [
                'name' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'description' => 'Program keahlian yang mempelajari tentang perakitan komputer, instalasi jaringan, dan troubleshooting.',
                'image' => '/assets/images/tjkt.png'
            ],
            [
                'name' => 'Teknik Otomotif',
                'description' => 'Program keahlian yang mempelajari tentang perawatan dan perbaikan kendaraan bermotor.',
                'image' => '/assets/images/tkr.png'
            ],
            [
                'name' => 'Teknik Pengelasan',
                'description' => 'Program keahlian yang mempelajari tentang teknik pengelasan dan fabrikasi logam.',
                'image' => '/assets/images/tflm.jpeg'
            ]
        ];

        return view('landing-page', compact(
            'berita',
            'agenda',
            'galeri',
            'achievements',
            'programs'
        ));
    }
}
