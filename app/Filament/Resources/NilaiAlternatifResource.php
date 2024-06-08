<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NilaiAlternatifResource\Pages;
use App\Filament\Resources\NilaiAlternatifResource\RelationManagers;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NilaiAlternatifResource extends Resource
{
    protected static ?string $model = NilaiAlternatif::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = 'Bantuan Sosial';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('alternatif_id')
                    ->label('Alternatif')
                    ->relationship('alternatif', 'nama')
                    ->required(),

                Repeater::make('nilai_kriterias')
                    ->label('Nilai Kriteria')
                    ->schema([
                        Select::make('kriteria_id')
                            ->label('Kriteria')
                            ->relationship('kriteria', 'nama')
                            ->required(),
                        TextInput::make('nilai')
                            ->label('Nilai')
                            ->required(),
                    ])
                    ->minItems(1)
                    ->createItemButtonLabel('Tambah Kriteria')
            ]);
    }

    public static function table(Table $table): Table
    {
        $kriterias = Kriteria::all();

        return $table
            ->columns(array_merge([
                TextColumn::make('alternatif.nama')->label('Alternatif')->sortable()->searchable(),
            ],
                $kriterias->map(function ($kriteria) {
                    return TextColumn::make("kriteria_{$kriteria->id}.nilai")
                        ->label($kriteria->nama)
                        ->sortable()
                        ->getStateUsing(function ($record) use ($kriteria) {
                            $nilai = NilaiAlternatif::where('alternatif_id', $record->id)
                                ->where('kriteria_id', $kriteria->id)
                                ->first()
                                ;
                            return $nilai ? $nilai->nilai : '-';
                        });
                })
                    ->toArray()))
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
