<?php

namespace App\Filament\Resources\ColisResource\Pages;

use App\Filament\Resources\ColisResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColis extends ListRecords
{
    protected static string $resource = ColisResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
