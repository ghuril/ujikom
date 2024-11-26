<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_id', 'file'];

    public function gallery()
    {
        return $this->belongsTo(Galery::class, 'gallery_id');
    }
}