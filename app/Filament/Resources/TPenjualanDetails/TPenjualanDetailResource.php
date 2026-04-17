<?php

namespace App\Filament\Resources\TPenjualanDetails;

use App\Filament\Resources\TPenjualanDetails\Pages\ViewTPenjualanDetail;
use App\Filament\Resources\TPenjualanDetails\Pages\CreateTPenjualanDetail;
use App\Filament\Resources\TPenjualanDetails\Pages\EditTPenjualanDetail;
use App\Filament\Resources\TPenjualanDetails\Pages\ListTPenjualanDetails;
use App\Filament\Resources\TPenjualanDetails\Schemas\TPenjualanDetailForm;
use App\Filament\Resources\TPenjualanDetails\Tables\TPenjualanDetailsTable;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\TPenjualanDetails\Schemas\TPenjualanDetailInfolist;
use App\Models\TPenjualanDetail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TPenjualanDetailResource extends Resource
{
    protected static ?string $model = TPenjualanDetail::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $modelLabel = 'Penjualan';
    protected static ?string $pluralModelLabel = 'Detail Penjualan';
    protected static ?string $navigationLabel = 'Detail Penjualan';

    protected static ?string $recordTitleAttribute = 'detail_id';

    public static function infolist(Schema $schema): Schema
    {
        return TPenjualanDetailInfolist::configure($schema);
    }

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
            'view' => ViewTPenjualanDetail::route('/{record}'),
            'edit' => EditTPenjualanDetail::route('/{record}/edit'),
        ];
    }
}
