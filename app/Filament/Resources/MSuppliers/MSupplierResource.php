<?php
namespace App\Filament\Resources;

use App\Filament\Resources\MSupplierResource\Pages;
use App\Models\MSupplier;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;

class MSupplierResource extends Resource {
    protected static ?string $model = MSupplier::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationLabel = 'Supplier';
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema {
        return $schema->components([
            TextInput::make('supplier_kode')->label('Kode Supplier')->required()->maxLength(10)->unique(ignoreRecord: true),
            TextInput::make('supplier_nama')->label('Nama Supplier')->required()->maxLength(100),
            TextInput::make('supplier_alamat')->label('Alamat')->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            TextColumn::make('supplier_kode')->label('Kode')->searchable()->sortable(),
            TextColumn::make('supplier_nama')->label('Nama Supplier')->searchable()->sortable(),
            TextColumn::make('supplier_alamat')->label('Alamat')->limit(40),
            TextColumn::make('created_at')->label('Dibuat')->dateTime('d/m/Y')->sortable(),
        ])->actions([EditAction::make()])
          ->bulkActions([DeleteBulkAction::make()]);
    }

    public static function getPages(): array {
        return [
            'index'  => Pages\ListMSuppliers::route('/'),
            'create' => Pages\CreateMSupplier::route('/create'),
            'edit'   => Pages\EditMSupplier::route('/{record}/edit'),
        ];
    }
}