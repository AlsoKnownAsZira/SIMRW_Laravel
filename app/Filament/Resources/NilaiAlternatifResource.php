<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NilaiAlternatifResource\Pages;
use App\Filament\Resources\NilaiAlternatifResource\RelationManagers;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;

class NilaiAlternatifResource extends Resource
{
    protected static ?string $model = NilaiAlternatif::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationGroup = 'Bantuan Sosial';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nilai')->label('Nilai')->required(),
                Select::make('alternatif_id')
                    ->label('Alternatif')
                    ->relationship('alternatif', 'nama')
                    ->reactive()
                    ->required()
                    ->afterStateUpdated(fn (Closure $set, $state) => $set('kriteria_id', null)), // Reset kriteria when alternatif changes

                Select::make('kriteria_id')
                    ->label('Kriteria')
                    ->relationship('kriteria', 'nama')
                    ->required()
                    ->options(function (Closure $get) {
                        $alternatifId = $get('alternatif_id');
                        if (!$alternatifId) {
                            return Kriteria::all()->pluck('nama', 'id');
                        }

                        $existingKriteriaIds = NilaiAlternatif::where('alternatif_id', $alternatifId)->pluck('kriteria_id');
                        return Kriteria::whereNotIn('id', $existingKriteriaIds)->pluck('nama', 'id');
                    })
                    ->disabled(fn (Closure $get) => !$get('alternatif_id')), // Disable if no alternatif is selected
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('alternatif.nama')->label('Alternatif')->sortable()->searchable(),
                TextColumn::make('kriteria.nama')->label('Kriteria'),
                TextColumn::make('nilai')->label('Nilai'),
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
            'index' => Pages\ListNilaiAlternatifs::route('/'),
            'create' => Pages\CreateNilaiAlternatif::route('/create'),
            'edit' => Pages\EditNilaiAlternatif::route('/{record}/edit'),
        ];
    }
}
