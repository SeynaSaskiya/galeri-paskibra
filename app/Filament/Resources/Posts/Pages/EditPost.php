<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use App\Models\Foto;
use App\Models\Galeri;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
    
    protected function afterSave(): void
    {
        $photos = $this->data['photos'] ?? [];

        if (!empty($photos)) {
            $galeri = Galeri::firstOrCreate(
                ['post_id' => $this->record->id],
                ['position' => 1, 'status' => true]     
            );

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
