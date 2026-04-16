<?php

namespace App\Filament\Resources\TPenjualanDetails\Pages;

use App\Filament\Resources\TPenjualanDetails\TPenjualanDetailResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTPenjualanDetail extends EditRecord
{
    protected static string $resource = TPenjualanDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
