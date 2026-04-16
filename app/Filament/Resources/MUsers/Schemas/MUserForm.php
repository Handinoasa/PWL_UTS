<?php

namespace App\Filament\Resources\MUsers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MUserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('level_id')
                    ->required()
                    ->numeric(),
                TextInput::make('username')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
            ]);
    }
}
