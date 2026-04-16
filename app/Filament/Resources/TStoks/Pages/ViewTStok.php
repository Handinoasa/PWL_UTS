<?php

namespace App\Filament\Resources\TStoks\Pages;

use App\Filament\Resources\TStoks\TStokResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTStok extends ViewRecord
{
    protected static string $resource = TStokResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
