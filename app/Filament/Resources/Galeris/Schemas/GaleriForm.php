<?php

namespace App\Filament\Resources\Galeris\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('post_id')
                    ->relationship('post', 'judul')
                    ->label('Post')
                    ->required(),
                TextInput::make('nama_file')
                    ->label('Nama File / Album')
                    ->maxLength(255),
                Toggle::make('status')
                     ->required(),
            ]);
    }
}
