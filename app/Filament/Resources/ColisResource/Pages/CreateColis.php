<?php

namespace App\Filament\Resources\ColisResource\Pages;

use App\Filament\Resources\ColisResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateColis extends CreateRecord
{
    protected static string $resource = ColisResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
