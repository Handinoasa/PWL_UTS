<?php

namespace App\Filament\Resources\MBarangs\Pages;

use App\Filament\Resources\MBarangs\MBarangResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMBarang extends EditRecord
{
    protected static string $resource = MBarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
