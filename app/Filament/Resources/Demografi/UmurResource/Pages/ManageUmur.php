<?php

namespace App\Filament\Resources\Demografi\UmurResource\Pages;

use App\Filament\Resources\Demografi\UmurResource;
use Filament\Resources\Pages\ManageRecords;

class ManageUmur extends ManageRecords
{
    protected static string $resource = UmurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Resources\Pages\CreateRecord::make(),
        ];
    }
}


