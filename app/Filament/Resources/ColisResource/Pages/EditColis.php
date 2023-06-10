<?php

namespace App\Filament\Resources\ColisResource\Pages;

use App\Filament\Resources\ColisResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditColis extends EditRecord
{
    protected static string $resource = ColisResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
