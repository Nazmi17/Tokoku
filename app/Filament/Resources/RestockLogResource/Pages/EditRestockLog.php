<?php

namespace App\Filament\Resources\RestockLogResource\Pages;

use App\Filament\Resources\RestockLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestockLog extends EditRecord
{
    protected static string $resource = RestockLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
