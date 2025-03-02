<?php

namespace App\Filament\Resources\RegistroAsistenciaResource\Pages;

use App\Filament\Resources\RegistroAsistenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegistroAsistencias extends ListRecords
{
    protected static string $resource = RegistroAsistenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
