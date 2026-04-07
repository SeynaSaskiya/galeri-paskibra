<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function beranda()
    {
        $posts = Post::where('status', 'published')
            ->with(['kategori', 'user', 'galeries.fotos'])
            ->latest()
            ->take(5)
            ->get();

        $galeries = Galeri::whereHas('fotos') 
            ->with(['fotos', 'post.user', 'post.kategori'])
            ->where('status', true)
            ->latest()
            ->take(5)
            ->get();
            
        $petaSekolah = Galeri::whereHas('post.kategori', function ($query) {
            $query->where('judul', 'Peta Sekolah');
        })
        ->with(['fotos', 'post'])
        ->latest()
        ->first();    
        
        return view('beranda', compact('posts', 'galeries', 'petaSekolah'));
    }

public function show(Post $post)
{
   // Pastikan post published
   if ($post->status !== 'published') {
    abort(404);
   }

   //Load relasi yang dibutuhkan
   $post->load(['kategori', 'user', 'galeries.fotos']);

   //Ambil semua foto dari semua galeri post ini
   $allPhotos = collect();
   foreach ($post->galeries as $galery) {
    $allPhotos = $allPhotos->concat($galery->fotos);
   }

   // Ambil foto pertama untuk hero image
   $heroImage = $allPhotos->first()?->file;

   // Ambil post terkait dari kategori yang sama, kecuali Peta Sekolah
   $relatedPosts = Post::where('status', 'published')
   ->where('id', '!=', $post->id)
   ->whereHas('kategori', function ($query) {
        $query->where('judul', '!=', 'Peta Sekolah');
        })
   ->with(['kategori', 'user', 'galeries.fotos'])
   ->latest()
   ->take(4)
   ->get();

   return view('post-detail', compact('post', 'allPhotos', 'heroImage', 'relatedPosts'));
}
}