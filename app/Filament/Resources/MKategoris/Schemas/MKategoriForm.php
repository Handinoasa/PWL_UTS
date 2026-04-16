<?php

namespace App\Filament\Resources\MKategoris\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MKategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kategori_kode')
                    ->required(),
                TextInput::make('kategori_nama')
                    ->required(),
            ]);
    }
}
