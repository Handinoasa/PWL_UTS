<?php

namespace App\Filament\Resources\TPenjualanDetails\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TPenjualanDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('penjualan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('barang_id')
                    ->required()
                    ->numeric(),
                TextInput::make('harga')
                    ->required()
                    ->numeric(),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
            ]);
    }
}
