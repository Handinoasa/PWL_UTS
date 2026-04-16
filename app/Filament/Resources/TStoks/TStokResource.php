<?php

namespace App\Filament\Resources\TStoks;

use App\Filament\Resources\TStoks\Pages\CreateTStok;
use App\Filament\Resources\TStoks\Pages\EditTStok;
use App\Filament\Resources\TStoks\Pages\ListTStoks;
use App\Filament\Resources\TStoks\Pages\ViewTStok;
use App\Filament\Resources\TStoks\Schemas\TStokForm;
use App\Filament\Resources\TStoks\Schemas\TStokInfolist;
use App\Filament\Resources\TStoks\Tables\TStoksTable;
use App\Models\TStok;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TStokResource extends Resource
{
    protected static ?string $model = TStok::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'stok_id';

    public static function form(Schema $schema): Schema
    {
        return TStokForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TStokInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TStoksTable::configure($table);
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
            'index' => ListTStoks::route('/'),
            'create' => CreateTStok::route('/create'),
            'view' => ViewTStok::route('/{record}'),
            'edit' => EditTStok::route('/{record}/edit'),
        ];
    }
}
