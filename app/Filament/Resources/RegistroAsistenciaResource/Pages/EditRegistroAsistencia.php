<?php

namespace App\Filament\Resources\RegistroAsistenciaResource\Pages;

use App\Filament\Resources\RegistroAsistenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegistroAsistencia extends EditRecord
{
    protected static string $resource = RegistroAsistenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
