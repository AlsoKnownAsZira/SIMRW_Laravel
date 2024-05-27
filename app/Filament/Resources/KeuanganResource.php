<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeuanganResource\Pages;
use App\Filament\Resources\KeuanganResource\RelationManagers;
use App\Models\Keuangan;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\Colors\Color;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Resources\Form\Components\DatePicker;
use Illuminate\Support\Facades\Money;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\TextInput;

class KeuanganResource extends Resource
{
    protected static ?string $model = Keuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jenis')
                    ->options([
                        'Masuk' => 'Masuk',
                        'Keluar' => 'Keluar',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('detail')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nominal')  
                    ->mask(fn (TextInput\Mask $mask) => $mask
                        ->money(prefix: 'Rp', thousandsSeparator: '.', decimalPlaces: 2, isSigned: false))
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('jenis')
                    ->label('Jenis')
                    ->colors([
                        'success' => 'Masuk',
                        'danger' => 'Keluar',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('detail')
                    ->label('Detail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nominal')
                    ->label('Nominal')
                    ->formatStateUsing(function ($state) {
                        return 'Rp' . number_format($state, 0, ',', '.');
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('jenis')
                    ->options([
                        'Masuk' => 'Masuk',
                        'Keluar' => 'Keluar',
                    ]),
                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('From'),
                        Forms\Components\DatePicker::make('Until'),
                    ])
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['From'] ?? null) {
                            $indicators['from'] = 'Created from' . Carbon::parse($data['From'])
                            ->toFormattedDateString();
                        }
                        if ($data['Until'] ?? null) {
                            $indicators['until'] = 'Created until' . Carbon::parse($data['Until'])
                            ->toFormattedDateString();
                        }
                        return $indicators;
                    })
                    ->query(function (Builder $query, array $data): Builder{
                        return $query
                            ->when(
                                $data['From'],
                                fn (Builder $query, $date): Builder => $query->whereDate
                                ('tanggal', '>=', $date),
                            )
                            ->when(
                                $data['Until'],
                                fn (Builder $query, $date): Builder => $query->whereDate
                                ('tanggal', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListKeuangans::route('/'),
            'create' => Pages\CreateKeuangan::route('/create'),
            'edit' => Pages\EditKeuangan::route('/{record}/edit'),
        ];
    }    
}
