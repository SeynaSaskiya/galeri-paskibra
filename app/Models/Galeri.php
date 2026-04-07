<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = ['post_id', 'nama_file', 'status'];
    // Relasi kebalikan (1 Galeri ini Milik 1 Post tertentu)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }   
    //Relasi ke tabel fotos (1 Album Galeri punya Banyak Foto fisik)
    public function fotos()
    {
        return $this->hasMany(Foto::class); 
    }   
}
