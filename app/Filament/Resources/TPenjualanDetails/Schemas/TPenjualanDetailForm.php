<?php

namespace App\Filament\Resources\TPenjualanDetails\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\TPenjualan;
use App\Models\MBarang;

class TPenjualanDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('penjualan_id')
                    ->label('No. Transaksi')
                    ->options(TPenjualan::pluck('penjualan_kode', 'penjualan_id'))
                    ->required()
                    ->searchable(),
                Select::make('barang_id')
                    ->label('Barang')
                    ->options(MBarang::pluck('barang_nama', 'barang_id'))
                    ->required()
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $barang = MBarang::find($state);
                        if ($barang) $set('harga', $barang->barang_jual);
                    }),
                TextInput::make('harga')
                    ->required()
                    ->numeric(),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
            ]);
    }
}
