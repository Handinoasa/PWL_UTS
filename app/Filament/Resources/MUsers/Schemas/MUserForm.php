<?php

namespace App\Filament\Resources\MUsers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\MLevel;

class MUserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('level_id')
                    ->label('Level')
                    ->options(MLevel::all()->pluck('level_nama', 'level_id'))
                    ->searchable()
                    ->required(),
                TextInput::make('username')
                    ->required()
                    ->autocomplete('off'),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->autocomplete('new-password'),
            ]);
    }
}
