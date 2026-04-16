<?php
namespace App\Filament\Resources;

use App\Filament\Resources\TPenjualanResource\Pages;
use App\Models\TPenjualan;
use App\Models\MUser;
use App\Models\MBarang;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;

class TPenjualanResource extends Resource {
    protected static ?string $model = TPenjualan::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Penjualan';
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema {
        return $schema->components([
            TextInput::make('penjualan_kode')->label('No. Transaksi')
                ->required()->maxLength(20)->unique(ignoreRecord: true)
                ->default(fn() => 'INV-' . date('YmdHis')),
            TextInput::make('pembeli')->label('Nama Pembeli')->required()->maxLength(50),
            Select::make('user_id')->label('Kasir')
                ->options(MUser::pluck('nama','user_id'))->required(),
            DateTimePicker::make('penjualan_tanggal')->label('Tanggal')->required()->default(now()),

            Repeater::make('details')
                ->relationship()
                ->label('Detail Barang')
                ->schema([
                    Select::make('barang_id')->label('Barang')
                        ->options(MBarang::pluck('barang_nama','barang_id'))
                        ->required()->searchable()
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $barang = MBarang::find($state);
                            if ($barang) $set('harga', $barang->harga_jual);
                        }),
                    TextInput::make('harga')->label('Harga')->numeric()->prefix('Rp')->required(),
                    TextInput::make('jumlah')->label('Jumlah')->numeric()->required()->minValue(1)->default(1),
                ])
                ->columns(3)
                ->minItems(1)
                ->addActionLabel('+ Tambah Barang'),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            TextColumn::make('penjualan_kode')->label('No. Transaksi')->searchable()->sortable(),
            TextColumn::make('pembeli')->label('Pembeli')->searchable(),
            TextColumn::make('user.nama')->label('Kasir'),
            TextColumn::make('penjualan_tanggal')->label('Tanggal')->dateTime('d/m/Y H:i')->sortable(),
        ])->defaultSort('penjualan_tanggal','desc')
          ->actions([EditAction::make()])
          ->bulkActions([DeleteBulkAction::make()]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array {
        return [
            'index'  => Pages\ListTPenjualans::route('/'),
            'create' => Pages\CreateTPenjualan::route('/create'),
            'edit'   => Pages\EditTPenjualan::route('/{record}/edit'),
        ];
    }
}