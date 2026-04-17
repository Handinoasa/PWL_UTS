<?php

namespace App\Filament\Resources\MLevels;

use App\Filament\Resources\MLevels\Pages\CreateMLevel;
use App\Filament\Resources\MLevels\Pages\EditMLevel;
use App\Filament\Resources\MLevels\Pages\ListMLevels;
use App\Filament\Resources\MLevels\Schemas\MLevelForm;
use App\Filament\Resources\MLevels\Tables\MLevelsTable;
use App\Models\MLevel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MLevelResource extends Resource
{
    protected static ?string $model = MLevel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'level_nama';
    protected static ?string $navigationLabel = 'Level';
    protected static ?string $modelLabel = 'Level';
    protected static ?string $pluralModelLabel = 'Level';

    public static function form(Schema $schema): Schema
    {
        return MLevelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MLevelsTable::configure($table);
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
            'index' => ListMLevels::route('/'),
            'create' => CreateMLevel::route('/create'),
            'edit' => EditMLevel::route('/{record}/edit'),
        ];
    }
}
