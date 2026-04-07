<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // Mendaftarkan kolom yang boleh diisi
protected $fillable = ['judul'];
// Relasi ke tabel posts (1 Kategori punya Banyak Post)
public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
