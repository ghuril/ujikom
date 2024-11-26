<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'kategori_id',
        'status'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
