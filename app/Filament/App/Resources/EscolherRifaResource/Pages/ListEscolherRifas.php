<?php

namespace App\Filament\App\Resources\EscolherRifaResource\Pages;

use App\Filament\App\Resources\EscolherRifaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEscolherRifas extends ListRecords
{
    protected static string $resource = EscolherRifaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
