<?php
namespace App\Filament\Resources\MKategoris;

use App\Filament\Resources\MKategoris\Pages;
use App\Models\MKategori;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;

class MKategoriResource extends Resource {
    protected static ?string $model = MKategori::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Kategori';
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = 'Kategori';
    protected static ?string $pluralModelLabel = 'Kategori';
    public static function form(Schema $schema): Schema {
        return $schema->components([
            TextInput::make('kategori_kode')->label('Kode Kategori')->required()->maxLength(10)->unique(ignoreRecord: true),
            TextInput::make('kategori_nama')->label('Nama Kategori')->required()->maxLength(100),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([

            TextColumn::make('kategori_kode')->label('Kode')->searchable()->sortable(),
            TextColumn::make('kategori_nama')->label('Nama Kategori')->searchable()->sortable(),
        ])->actions([EditAction::make()])
          ->bulkActions([DeleteBulkAction::make()]);
    }

    public static function getPages(): array {
        return [
            'index'  => Pages\ListMKategoris::route('/'),
            'create' => Pages\CreateMKategori::route('/create'),
            'edit'   => Pages\EditMKategori::route('/{record}/edit'),
        ];
    }
}