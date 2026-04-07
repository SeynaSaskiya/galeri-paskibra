<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use App\Models\Galeri;
use App\Models\Foto;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function afterCreate(): void
    {
        $photos = $this->data['photos'] ?? [];

        if (!empty($photos)) {
            $galeri = Galeri::create([
                'post_id' => $this->record->id,
                'position' => 1,
                'status' => true,
            ]);

            foreach ($photos as $photo) {
                Foto::create([
                    'galeri_id' => $galeri->id,
                    'file' => $photo,
                    'judul' => null,
                ]);
            }
        }
    }
}
