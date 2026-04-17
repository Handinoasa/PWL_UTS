<?php

namespace App\Filament\Resources\TPenjualanDetails\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TPenjualanDetailInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Rincian Item Penjualan')
                    ->icon('heroicon-o-document-magnifying-glass')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('penjualan.penjualan_kode')
                                    ->label('No. Transaksi')
                                    ->weight('bold')
                                    ->color('primary')
                                    ->copyable(),
                                TextEntry::make('barang.barang_nama')
                                    ->label('Nama Barang')
                                    ->weight('bold'),
                                TextEntry::make('harga')
                                    ->label('Harga Satuan')
                                    ->money('IDR'),
                                TextEntry::make('jumlah')
                                    ->label('Jumlah'),
                                TextEntry::make('subtotal')
                                    ->label('Subtotal (Total Item)')
                                    ->money('IDR')
                                    ->weight('bold')
                                    ->size('lg')
                                    ->color('success'),
                            ]),
                    ]),
                
                Section::make('Informasi Tambahan')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('created_at')
                                    ->label('Dibuat Pada')
                                    ->dateTime('d F Y H:i'),
                                TextEntry::make('updated_at')
                                    ->label('Diperbarui Pada')
                                    ->dateTime('d F Y H:i'),
                            ]),
                    ])
                    ->collapsed(),
            ]);
    }
}
