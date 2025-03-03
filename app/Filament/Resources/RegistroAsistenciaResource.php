<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroAsistenciaResource\Pages;
use App\Models\RegistroAsistencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth; // Para obtener el usuario logueado

class RegistroAsistenciaResource extends Resource
{
    protected static ?string $model = RegistroAsistencia::class;
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Registros de Asistencia';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // El formulario CRUD (si lo necesitas)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Aquí defines las columnas que se muestran en la tabla
                Tables\Columns\TextColumn::make('user.name')->label('Usuario'),
                Tables\Columns\TextColumn::make('fecha')->label('Fecha')->date(),
                Tables\Columns\TextColumn::make('hora_entrada')->label('Hora de Entrada')->dateTime(),
                Tables\Columns\TextColumn::make('hora_salida')->label('Hora de Salida')->dateTime(),
                // ... resto de columnas ...
            ])
            ->headerActions([
                // Acción para MARCAR ENTRADA
                Tables\Actions\Action::make('marcarEntrada')
                    ->label('Marcar Entrada')
                    ->requiresConfirmation()   // Muestra un modal de confirmación
                    ->action(function (): void {
                        $user = Auth::user();

                        // Buscar si ya existe un registro para HOY
                        $registro = RegistroAsistencia::where('user_id', $user->id)
                            ->whereDate('fecha', now()->toDateString())
                            ->first();

                        // Si no existe, lo creamos; si existe, actualizamos la hora_entrada
                        if (! $registro) {
                            RegistroAsistencia::create([
                                'user_id'      => $user->id,
                                'fecha'        => now()->toDateString(),
                                'hora_entrada' => now(),
                            ]);
                        } else {
                            // Opcional: Evitar sobreescribir la entrada si ya existe
                            // if (!$registro->hora_entrada) { ... }

                            $registro->hora_entrada = now();
                            $registro->save();
                        }
                    }),

                // Acción para MARCAR SALIDA
                Tables\Actions\Action::make('marcarSalida')
                    ->label('Marcar Salida')
                    ->requiresConfirmation()
                    ->action(function (): void {
                        $user = Auth::user();

                        $registro = RegistroAsistencia::where('user_id', $user->id)
                            ->whereDate('fecha', now()->toDateString())
                            ->first();

                        // Si no existe un registro para hoy, lo creamos con hora_salida
                        if (! $registro) {
                            RegistroAsistencia::create([
                                'user_id'     => $user->id,
                                'fecha'       => now()->toDateString(),
                                'hora_salida' => now(),
                            ]);
                        } else {
                            $registro->hora_salida = now();
                            $registro->save();
                        }
                    }),
            ])
            ->actions([
                // Acciones por fila, como Editar
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Acciones masivas
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
