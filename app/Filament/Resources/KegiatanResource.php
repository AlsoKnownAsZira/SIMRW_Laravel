<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Filament\Resources\KegiatanResource\RelationManagers;
use App\Models\kegiatan;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KegiatanResource extends Resource
{
    protected static ?string $model = kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-s-puzzle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor')
                    ->label('Nomor')
                    ->disabled()
                ,
                Forms\Components\DatePicker::make('tanggal')->required()
//                    ->formatStateUsing(function ($state) {
//                        return Carbon::parse($state)->toDateString();
//                    }),
                , Forms\Components\TimePicker::make('pukul')->required(),
                Forms\Components\TextInput::make('tempat')->required(),
                Forms\Components\TextInput::make('perihal')->required(),
                Forms\Components\Textarea::make('acara')->required(),
                Forms\Components\Select::make('role_id')
                    ->relationship('role', 'name')
                    ->required(),
            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->formatStateUsing(function ($state) {
                        Carbon::setLocale('id'); // Set locale to Indonesian
                        return Carbon::parse($state)->translatedFormat('l, j F Y');
                    }),
                Tables\Columns\TextColumn::make('pukul')
                    ->label('Pukul')
//                    ->formatStateUsing(function ($state) {
//                        return Carbon::parse($state)->format('H:i');
//                    }),
                , Tables\Columns\TextColumn::make('tempat'),
                Tables\Columns\TextColumn::make('perihal'),
                Tables\Columns\TextColumn::make('role.name')->label('RT'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('download')
                    ->label('Download PDF')
                    ->icon('heroicon-s-document')
//                    ->action(function (Kegiatan $record) {
//                        return redirect()->route('filament.kegiatan.downloadPdf', $record);
//                    })->openUrlInNewTab(),
                    ->url(fn(Kegiatan $record) => route('filament.kegiatan.downloadPdf', $record)),
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
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('role');
    }
}
