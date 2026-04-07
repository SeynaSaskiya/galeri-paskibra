<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Kategori;
use App\Models\User;
use App\Models\Galeri;

class Post extends Model
{
    protected $fillable = ['judul', 'kategori_id', 'isi', 'user_id', 'status'];
    // Relasi kebalikan (1 Post ini Milik 1 Kategori tertentu)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    // Relasi kebalikan (1 Post ini Ditulis oleh 1 Petugas tertentu)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Relasi ke tabel galeries (1 Post bisa menampung Banyak Album Galeri)
    public function galeries()
    {
        return $this->hasMany(Galeri::class);
    }   
}
