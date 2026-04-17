<?php

namespace App\Filament\Resources\TPenjualanDetails\Pages;

use App\Filament\Resources\TPenjualanDetails\TPenjualanDetailResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTPenjualanDetail extends ViewRecord
{
    protected static string $resource = TPenjualanDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
