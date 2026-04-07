<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('judul');
        }); 

        //Generate slug untuk data yang sudah ada
        $posts = \App\Models\Post::all();
        foreach ($posts as $post) {
            $post->slug = Str::slug($post->judul);
            $post->saveQuietly();
        }
    }

    public function down(): void


    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('slug');
            
        });
    }
};
