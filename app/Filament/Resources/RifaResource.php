<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RifaResource\Pages;
use App\Filament\Resources\RifaResource\RelationManagers;
use App\Models\Rifa;
use App\Models\CategoriaRifa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RifaResource extends Resource
{
    protected static ?string $model = Rifa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('categoria_rifa_id')
                    ->label('Categoria de Rifa')
                    ->options(function () {
                        return CategoriaRifa::pluck('categoria_rifa', 'id');
                    })
                    ->required(),

                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(191),

                Forms\Components\FileUpload::make('imagem')
                    ->image()
                    ->imageEditor()
                    ->required(),

                Forms\Components\TextInput::make('status')
                    ->default(0),

                Forms\Components\TextInput::make('valor')
                    ->required()
                    ->numeric(),

                Forms\Components\Textarea::make('descricao')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\DatePicker::make('data_inicio')
                    ->required(),

                Forms\Components\DatePicker::make('data_previsao_sorteio')
                    ->required(),

                Forms\Components\TextInput::make('limite_numeros')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('categoria_rifa.categoria_rifa')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('titulo')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('imagem')
                    ->circular(),

                Tables\Columns\TextColumn::make('status')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('valor')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('data_inicio')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('data_previsao_sorteio')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('limite_numeros')
                    ->numeric()
                    ->sortable(),

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
            'index' => Pages\ListRifas::route('/'),
            'create' => Pages\CreateRifa::route('/create'),
            'edit' => Pages\EditRifa::route('/{record}/edit'),
        ];
    }
}
