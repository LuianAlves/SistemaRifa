<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\EscolherRifaResource\Pages;
use App\Filament\App\Resources\EscolherRifaResource\RelationManagers;
use App\Models\EscolherRifa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EscolherRifaResource extends Resource
{
    protected static ?string $model = EscolherRifa::class;

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
            'index' => Pages\ListEscolherRifas::route('/'),
            'create' => Pages\CreateEscolherRifa::route('/create'),
            'edit' => Pages\EditEscolherRifa::route('/{record}/edit'),
        ];
    }
}