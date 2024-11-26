<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $programs = [
            [
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Program keahlian yang mempelajari tentang perakitan komputer, instalasi jaringan, dan troubleshooting.',
                'image' => 'images/program/tkj.jpg'
            ],
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'description' => 'Program keahlian yang mempelajari tentang pemrograman, pengembangan aplikasi, dan database.',
                'image' => 'images/program/rpl.jpg'
            ],
            [
                'name' => 'Multimedia',
                'description' => 'Program keahlian yang mempelajari tentang desain grafis, animasi, dan editing video.',
                'image' => 'images/program/mm.jpg'
            ]
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
} 