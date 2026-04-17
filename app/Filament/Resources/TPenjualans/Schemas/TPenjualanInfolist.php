<?php

namespace App\Filament\Resources\TPenjualans\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TPenjualanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Penjualan')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('penjualan_kode')
                                    ->label('No. Transaksi')
                                    ->weight('bold')
                                    ->color('primary')
                                    ->copyable(),
                                TextEntry::make('penjualan_tanggal')
                                    ->label('Tanggal Transaksi')
                                    ->dateTime('d F Y H:i'),
                                TextEntry::make('user.nama')
                                    ->label('Kasir')
                                    ->icon('heroicon-m-user'),
                                TextEntry::make('pembeli')
                                    ->label('Nama Pembeli')
                                    ->icon('heroicon-m-identification'),
                            ]),
                    ]),

                Section::make('Daftar Barang')
                    ->icon('heroicon-o-shopping-bag')
                    ->schema([
                        RepeatableEntry::make('details')
                            ->label('')
                            ->schema([
                                Grid::make(4)
                                    ->schema([
                                        TextEntry::make('barang.barang_nama')
                                            ->label('Barang'),
                                        TextEntry::make('harga')
                                            ->label('Harga Satuan')
                                            ->money('IDR'),
                                        TextEntry::make('jumlah')
                                            ->label('Jumlah'),
                                        TextEntry::make('subtotal')
                                            ->label('Subtotal')
                                            ->money('IDR')
                                            ->weight('bold'),
                                    ]),
                            ])
                            ->columns(1),
                    ]),

                Section::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('total')
                                    ->label('Total Pembayaran')
                                    ->weight('bold')
                                    ->size('lg')
                                    ->color('success')
                                    ->money('IDR')
                                    ->columnStart(2),
                            ]),
                    ]),
            ]);
    }
}
