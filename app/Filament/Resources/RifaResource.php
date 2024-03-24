<?php

namespace App\Filament\Resources;

use App\Enums\RifaStatusTypeEnum;
use App\Filament\Resources\RifaResource\Pages;
use App\Filament\Resources\RifaResource\RelationManagers;
use App\Models\Rifa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\QueryBuilder\Constraints\SelectConstraint;
use Filament\Tables\Table;

class RifaResource extends Resource
{
    protected static ?string $model = Rifa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "RIFAS";

    protected static ?string $slug = "rifa";

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
//                Forms\Components\Select::make('categoria_rifa_id')
//                    ->label('Categoria de Rifa')
//                    ->options(function () {
//                        return CategoriaRifa::pluck('categoria_rifa', 'id');
//                    })
//                    ->required(),

                Forms\Components\Select::make('categoria_rifa_id')
                    ->label('Categoria de Rifa')
                    ->relationship('categoriaRifa', 'categoria_rifa')
                    ->required(),

                Forms\Components\TextInput::make('titulo')
                    ->label('Nome')
                    ->required()
                    ->maxLength(191),

                Forms\Components\FileUpload::make('imagem')
                    ->label('Foto da Rifa')
                    ->image()
                    ->openable() // Abrir imagem
                    ->downloadable() // Baixar imagem
                    ->directory('imagens_rifa'),

                Forms\Components\TextInput::make('status')
                    ->label('Status da Rifa')
                    ->default('aberto')
                    ->disabled(),

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
                    ->sortable()
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('titulo')
                    ->label('Nome')
                    ->searchable()
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\ImageColumn::make('imagem')
                    ->circular(),

                Tables\Columns\TextColumn::make('valor')
                    ->numeric()
                    ->money('BRL')
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('limite_numeros')
                    ->numeric()
                    ->sortable()
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),


                Tables\Columns\TextColumn::make('data_inicio')
                    ->date()
                    ->sortable()
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('data_previsao_sorteio')
                    ->date()
                    ->sortable()
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->badge()
                    ->color(fn(RifaStatusTypeEnum $state): string => match ($state) {
                        RifaStatusTypeEnum::ABERTO => 'success',
                        RifaStatusTypeEnum::ANDAMENTO => 'warning',
                        RifaStatusTypeEnum::FINALIZADO => 'danger',
                    })
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->alignCenter()
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
