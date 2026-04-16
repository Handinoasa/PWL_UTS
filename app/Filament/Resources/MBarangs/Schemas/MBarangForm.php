<?php

namespace App\Filament\Resources\MBarangs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MBarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kategori_id')
                    ->required()
                    ->numeric(),
                TextInput::make('barang_kode')
                    ->required(),
                TextInput::make('barang_nama')
                    ->required(),
                TextInput::make('barang_beli')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('barang_jual')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
