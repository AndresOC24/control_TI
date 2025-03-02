<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroAsistenciaResource\Pages;
use App\Filament\Resources\RegistroAsistenciaResource\RelationManagers;
use App\Models\RegistroAsistencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistroAsistenciaResource extends Resource
{
    protected static ?string $model = RegistroAsistencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistroAsistencias::route('/'),
            'create' => Pages\CreateRegistroAsistencia::route('/create'),
            'edit' => Pages\EditRegistroAsistencia::route('/{record}/edit'),
        ];
    }
}
