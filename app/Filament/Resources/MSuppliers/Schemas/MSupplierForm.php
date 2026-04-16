<?php

namespace App\Filament\Resources\MSuppliers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MSupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('supplier_kode')
                    ->required(),
                TextInput::make('supplier_name')
                    ->required(),
                TextInput::make('supplier_action'),
            ]);
    }
}
