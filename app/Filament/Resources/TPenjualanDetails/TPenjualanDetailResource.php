<?php

namespace App\Filament\Resources\TPenjualanDetails;

use App\Filament\Resources\TPenjualanDetails\Pages\CreateTPenjualanDetail;
use App\Filament\Resources\TPenjualanDetails\Pages\EditTPenjualanDetail;
use App\Filament\Resources\TPenjualanDetails\Pages\ListTPenjualanDetails;
use App\Filament\Resources\TPenjualanDetails\Schemas\TPenjualanDetailForm;
use App\Filament\Resources\TPenjualanDetails\Tables\TPenjualanDetailsTable;
use App\Models\TPenjualanDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TPenjualanDetailResource extends Resource
{
    protected static ?string $model = TPenjualanDetail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'detail_id';

    public static function form(Schema $schema): Schema
    {
        return TPenjualanDetailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TPenjualanDetailsTable::configure($table);
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
            'index' => ListTPenjualanDetails::route('/'),
            'create' => CreateTPenjualanDetail::route('/create'),
            'edit' => EditTPenjualanDetail::route('/{record}/edit'),
        ];
    }
}
