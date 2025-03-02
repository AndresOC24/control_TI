<?php

namespace App\Filament\Resources\HorariosRegularesResource\Pages;

use App\Filament\Resources\HorariosRegularesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHorariosRegulares extends ListRecords
{
    protected static string $resource = HorariosRegularesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
