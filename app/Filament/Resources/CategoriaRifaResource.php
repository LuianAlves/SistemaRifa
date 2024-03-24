<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriaRifaResource\Pages;
use App\Filament\Resources\CategoriaRifaResource\RelationManagers;
use App\Models\CategoriaRifa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CategoriaRifaResource extends Resource
{
    protected static ?string $model = CategoriaRifa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = "Categoria de Rifa";
    protected static ?string $navigationGroup = "RIFAS";

    protected static ?string $slug = "categoria-de-rifa";

    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('categoria_rifa')
                    ->label('Categoria de Rifa')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('categoria_rifa')
                    ->label("Categoria de Rifa")
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListCategoriaRifas::route('/'),
            'create' => Pages\CreateCategoriaRifa::route('/create'),
            'edit' => Pages\EditCategoriaRifa::route('/{record}/edit'),
        ];
    }
}
