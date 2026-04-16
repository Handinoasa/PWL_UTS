<?php

namespace App\Filament\Resources\TPenjualans\Pages;

use App\Filament\Resources\TPenjualans\TPenjualanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTPenjualan extends ViewRecord
{
    protected static string $resource = TPenjualanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
