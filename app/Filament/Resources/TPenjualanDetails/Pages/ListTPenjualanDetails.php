<?php

namespace App\Filament\Resources\TPenjualanDetails\Pages;

use App\Filament\Resources\TPenjualanDetails\TPenjualanDetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTPenjualanDetails extends ListRecords
{
    protected static string $resource = TPenjualanDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
