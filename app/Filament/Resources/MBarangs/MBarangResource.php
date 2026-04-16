<?php

namespace App\Filament\Resources\MBarangs;

use App\Filament\Resources\MBarangs\Pages\CreateMBarang;
use App\Filament\Resources\MBarangs\Pages\EditMBarang;
use App\Filament\Resources\MBarangs\Pages\ListMBarangs;
use App\Filament\Resources\MBarangs\Schemas\MBarangForm;
use App\Filament\Resources\MBarangs\Tables\MBarangsTable;
use App\Models\MBarang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MBarangResource extends Resource
{
    protected static ?string $model = MBarang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'barang_nama';

    public static function form(Schema $schema): Schema
    {
        return MBarangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MBarangsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMBarangs::route('/'),
            'create' => CreateMBarang::route('/create'),
            'edit' => EditMBarang::route('/{record}/edit'),
        ];
    }
}
