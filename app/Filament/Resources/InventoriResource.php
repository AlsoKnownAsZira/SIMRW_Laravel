<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Inventori;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Faker\Provider\ar_EG\Text;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InventoriResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InventoriResource\RelationManagers;

class InventoriResource extends Resource
{
    protected static ?string $model = Inventori::class;

    protected static ?string $navigationIcon = 'heroicon-s-archive';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nama')->required(),
                        TextInput::make('jumlah')->required()->numeric(),
                        TextInput::make('deskripsi'),
                        // RichEditor::make('deskripsi'),
                        FileUpload::make('gambar')->directory('inventory')->visibility('public'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('jumlah')->sortable(),
                TextColumn::make('deskripsi'),
                ImageColumn::make('gambar')
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListInventoris::route('/'),
            'create' => Pages\CreateInventori::route('/create'),
            'edit' => Pages\EditInventori::route('/{record}/edit'),
        ];
    }
}
