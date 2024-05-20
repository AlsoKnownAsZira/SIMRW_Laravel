<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataAduanResource\Pages;
use App\Filament\Resources\DataAduanResource\RelationManagers;
use App\Models\data_aduan;
use App\Models\DataAduan;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataAduanResource extends Resource
{
    protected static ?string $model = data_aduan::class;
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        if (auth()->user()->hasRole(['Warga', 'Warga2'])) {
            $additionalSchema = [
                TextInput::make('judul')->required(),
                Forms\Components\Textarea::make('judul')->required(),
            ];
        }

        return $form
            ->schema([

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
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDataAduans::route('/'),
            'create' => Pages\CreateDataAduan::route('/create'),
            'edit' => Pages\EditDataAduan::route('/{record}/edit'),
        ];
    }
}
