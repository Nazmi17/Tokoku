<?php

namespace App\Filament\Resources\RestockLogResource\Pages;

use App\Filament\Resources\RestockLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRestockLogs extends ListRecords
{
    protected static string $resource = RestockLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
