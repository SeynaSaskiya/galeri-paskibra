<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                Select::make('kategori_id')
                    ->relationship('kategori', 'judul')
                    ->required()
                    ->searchable()
                    ->preload(),
                RichEditor::make('isi')
                    ->required()
                    ->columnSpanFull(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->required()
                    ->default('draft'),
                Section::make('Galeri Foto')
                        ->description('Upload Foto untuk galeri post ini')
                        ->columnSpanFull()
                        ->schema([
                            FileUpload::make('photos')
                                ->label('Foto')
                                ->multiple()
                                ->image()
                                ->disk('public')
                                ->directory('galeri-fotos')
                                ->reorderable()
                                ->maxSize(2048)
                                ->columnSpanFull()
                                ->dehydrated(false),
                        ]),
            ]);
    }
}
