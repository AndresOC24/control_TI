<?php

namespace App\Filament\Resources\HorariosRegularesResource\Pages;

use App\Filament\Resources\HorariosRegularesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHorariosRegulares extends EditRecord
{
    protected static string $resource = HorariosRegularesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
