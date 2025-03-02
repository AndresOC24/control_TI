<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HorariosRegularesResource\Pages;
use App\Models\HorariosRegulares;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HorariosRegularesResource extends Resource
{
    protected static ?string $model = HorariosRegulares::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Selección del usuario relacionado
                Forms\Components\Select::make('user_id')
                    ->label('Usuario')
                    ->relationship('user', 'name')
                    ->required(),

                // TimePickers para las horas
                Forms\Components\TimePicker::make('hora_entrada')
                    ->label('Hora de Entrada')
                    ->required(),
                Forms\Components\TimePicker::make('hora_salida')
                    ->label('Hora de Salida')
                    ->required(),

                // Select para el día de la semana
                Forms\Components\Select::make('dia_semana')
                    ->label('Día de la Semana')
                    ->options([
                        'Lunes'     => 'Lunes',
                        'Martes'    => 'Martes',
                        'Miercoles' => 'Miercoles',
                        'Jueves'    => 'Jueves',
                        'Viernes'   => 'Viernes',
                        'Sabado'    => 'Sabado',
                        'Domingo'   => 'Domingo',
                    ])
                    ->required(),

                // Toggle para indicar si está activo
                Forms\Components\Toggle::make('activo')
                    ->label('Activo')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Muestra el nombre del usuario en lugar de user_id
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuario')
                    ->sortable(),
                Tables\Columns\TextColumn::make('hora_entrada')
                    ->label('Hora de Entrada'),
                Tables\Columns\TextColumn::make('hora_salida')
                    ->label('Hora de Salida'),
                Tables\Columns\TextColumn::make('dia_semana')
                    ->label('Día de la Semana'),
                Tables\Columns\IconColumn::make('activo')
                    ->label('Activo')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Puedes agregar filtros si lo requieres
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
            // Si tienes relaciones adicionales, agrégalas aquí
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHorariosRegulares::route('/'),
            'create' => Pages\CreateHorariosRegulares::route('/create'),
            'edit'   => Pages\EditHorariosRegulares::route('/{record}/edit'),
        ];
    }
}
