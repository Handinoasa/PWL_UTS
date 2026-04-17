<?php

namespace App\Filament\Resources\MBarangs;

use App\Filament\Resources\MBarangs\Pages;
use App\Models\MBarang;
use App\Models\MKategori;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;

class MBarangResource extends Resource
{
    protected static ?string $model = MBarang::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationLabel = 'Barang';
    protected static ?string $modelLabel = 'Barang';
    protected static ?string $pluralModelLabel = 'Barang';
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';
    protected static ?string $recordTitleAttribute = 'barang_nama';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema {
        return $schema->components([
            Select::make('kategori_id')
                ->label('Kategori')
                ->options(MKategori::pluck('kategori_nama', 'kategori_id'))
                ->required()
                ->searchable(),
            TextInput::make('barang_kode')
                ->label('Kode Barang')
                ->required()
                ->maxLength(10)
                ->unique(ignoreRecord: true),
            TextInput::make('barang_nama')
                ->label('Nama Barang')
                ->required()
                ->maxLength(100),
            TextInput::make('barang_beli')
                ->label('Harga Beli')
                ->numeric()
                ->prefix('Rp')
                ->required(),
            TextInput::make('barang_jual')
                ->label('Harga Jual')
                ->numeric()
                ->prefix('Rp')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table{
        return $table
            ->columns([
                TextColumn::make('barang_kode')
                    ->label('Kode')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('barang_nama')
                    ->label('Nama Barang')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kategori.kategori_nama')
                    ->label('Kategori')
                    ->sortable(),
                TextColumn::make('barang_beli')
                    ->label('Harga Beli')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('barang_jual')
                    ->label('Harga Jual')
                    ->money('IDR')
                    ->sortable(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMBarangs::route('/'),
            'create' => Pages\CreateMBarang::route('/create'),
            'edit'   => Pages\EditMBarang::route('/{record}/edit'),
        ];
    }
}