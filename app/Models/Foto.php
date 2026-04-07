<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = ['galeri_id', 'file', 'judul'];
    //Relasi kebalikan (1 Foto ini Milik 1 Album Galeri tertentu)   
    public function galeri()    
     {
        return $this->belongsTo(Galeri::class); 
     }
}
