<?php
namespace App\Filament\Resources;

use App\Filament\Resources\TStokResource\Pages;
use App\Models\TStok;
use App\Models\MSupplier;
use App\Models\MBarang;
use App\Models\MUser;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;

class TStokResource extends Resource {
    protected static ?string $model = TStok::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Stok Masuk';
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema {
        return $schema->components([
            Select::make('supplier_id')->label('Supplier')
                ->options(MSupplier::pluck('supplier_nama','supplier_id'))->required()->searchable(),
            Select::make('barang_id')->label('Barang')
                ->options(MBarang::pluck('barang_nama','barang_id'))->required()->searchable(),
            Select::make('user_id')->label('Petugas')
                ->options(MUser::pluck('nama','user_id'))->required(),
            DateTimePicker::make('stok_tanggal')->label('Tanggal')->required()->default(now()),
            TextInput::make('stok_jumlah')->label('Jumlah')->numeric()->required()->minValue(1),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            TextColumn::make('stok_id')->label('#')->sortable(),
            TextColumn::make('barang.barang_nama')->label('Barang')->searchable()->sortable(),
            TextColumn::make('supplier.supplier_nama')->label('Supplier')->sortable(),
            TextColumn::make('user.nama')->label('Petugas'),
            TextColumn::make('stok_jumlah')->label('Jumlah')->sortable(),
            TextColumn::make('stok_tanggal')->label('Tanggal')->dateTime('d/m/Y H:i')->sortable(),
        ])->defaultSort('stok_tanggal','desc')
          ->actions([EditAction::make()])
          ->bulkActions([DeleteBulkAction::make()]);
    }

    public static function getPages(): array {
        return [
            'index'  => Pages\ListTStoks::route('/'),
            'create' => Pages\CreateTStok::route('/create'),
            'edit'   => Pages\EditTStok::route('/{record}/edit'),
        ];
    }
}