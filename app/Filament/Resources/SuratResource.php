<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Surat;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use function Laravel\Prompts\text;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SuratResource\Pages;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SuratResource\RelationManagers;

class SuratResource extends Resource
{
    protected static ?string $model = Surat::class;

    protected static ?string $navigationIcon = 'heroicon-s-inbox';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('pemohon')->required(),
                        TextInput::make('nik')->required(),
                        Select::make('jenis_kelamin')
                            ->options([
                               'Laki-laki' => 'Laki-laki',
                                 'Perempuan' => 'Perempuan',
                            ]),
                            TextInput::make('alamat')->required(),
                            Select::make('perihal')
                            ->options([
                                'pengantar' => 'Surat Pengantar',
                                'kelahiran' => 'Akta Kelahiran',
                                'kematian' => 'Akta Kematian',
                                'sktm' => 'Surat Keterangan Tidak Mampu',
                            ]),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
{
    $perihalLabels = [
        'pengantar' => 'Surat Pengantar',
        'kelahiran' => 'Akta Kelahiran',
        'kematian' => 'Akta Kematian',
        'sktm' => 'Surat Keterangan Tidak Mampu',
    ];

    return $table
        ->columns([
            TextColumn::make('pemohon')->sortable()->searchable(),
            TextColumn::make('nik')->sortable()->searchable(),
            TextColumn::make('jenis_kelamin'),
            TextColumn::make('alamat'),
            TextColumn::make('perihal')
                ->formatStateUsing(function ($state) use ($perihalLabels) {
                    return $perihalLabels[$state] ?? $state;
                }),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
            Tables\Actions\Action::make('downloadPdf')
                    ->label('Download PDF')
                    ->action(function ($record) {
                        $perihalLabels = [
                            'pengantar' => 'Surat Pengantar',
                            'kelahiran' => 'Akta Kelahiran',
                            'kematian' => 'Akta Kematian',
                            'sktm' => 'Surat Keterangan Tidak Mampu',
                        ];
                        $pdf = PDF::loadView('surat.pdf', [
                            'surat' => $record,
                            'perihalLabels' => $perihalLabels,
                        ]);
                        return response()->streamDownload(
                            fn() => print($pdf->stream()),
                            "surat_{$record->id}.pdf"
                        );
                    }), 
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
            'index' => Pages\ListSurats::route('/'),
            'create' => Pages\CreateSurat::route('/create'),
            'edit' => Pages\EditSurat::route('/{record}/edit'),
        ];
    }    
}
