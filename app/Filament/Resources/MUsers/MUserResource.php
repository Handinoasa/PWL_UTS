<?php

namespace App\Filament\Resources\MUsers;

use App\Filament\Resources\MUsers\Pages\CreateMUser;
use App\Filament\Resources\MUsers\Pages\EditMUser;
use App\Filament\Resources\MUsers\Pages\ListMUsers;
use App\Filament\Resources\MUsers\Schemas\MUserForm;
use App\Filament\Resources\MUsers\Tables\MUsersTable;
use App\Models\MUser;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MUserResource extends Resource
{
    protected static ?string $model = MUser::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return MUserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MUsersTable::configure($table);
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
            'index' => ListMUsers::route('/'),
            'create' => CreateMUser::route('/create'),
            'edit' => EditMUser::route('/{record}/edit'),
        ];
    }
}
