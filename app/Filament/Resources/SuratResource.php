<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Surat;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
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
        if (auth()->user()->hasRole(['Warga', 'Warga2'])) {
            $additionalSchema = [
                TextInput::make('pemohon')->required(),
                TextInput::make('nik')->required(),
                Select::make('jenis_kelamin')
                    ->options([
                        'laki-laki' => 'laki-laki',
                        'perempuan' => 'perempuan',
                    ]),
                TextInput::make('alamat')->required(),
                Select::make('perihal')
                    ->options([
                        'pengantar' => 'Surat Pengantar',
                        'kelahiran' => 'Akta Kelahiran',
                        'kematian' => 'Akta Kematian',
                        'sktm' => 'Surat Keterangan Tidak Mampu',
                    ]),
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id())
                    ->required(),
            ];

            $baseSchema = array_merge([
                Card::make()->schema($additionalSchema)
            ]);

        } elseif (auth()->user()->hasRole(['Admin', 'RW', 'RT1', 'RT2'])) {
            $additionalSchema = [
                TextInput::make('pemohon')
                    ->required()
                    ->disabled(fn($record) => $record !== null),
                TextInput::make('nik')
                    ->required()
                    ->disabled(fn($record) => $record !== null),
                Select::make('jenis_kelamin')
                    ->options([
                        'laki-laki' => 'laki-laki',
                        'perempuan' => 'perempuan',
                    ])
                    ->disabled(fn($record) => $record !== null),
                TextInput::make('alamat')
                    ->required()
                    ->disabled(fn($record) => $record !== null),
                Select::make('perihal')
                    ->options([
                        'pengantar' => 'Surat Pengantar',
                        'kelahiran' => 'Akta Kelahiran',
                        'kematian' => 'Akta Kematian',
                        'sktm' => 'Surat Keterangan Tidak Mampu',
                    ])
                    ->disabled(fn($record) => $record !== null),
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id())
                    ->required()
                    ->disabled(fn($record) => $record !== null),
            ];

            $baseSchema = array_merge([
                Card::make()->schema($additionalSchema)
            ]);
        }

        return $form->schema($baseSchema)->columns(2);
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
                TextColumn::make('User.name')
                    ->label('Pembuat')
                    ->sortable()
                    ->searchable(),
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
//            'edit' => Pages\EditSurat::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery()->with('user');

        if (auth()->user()->hasRole('Warga')) {
            return $query->where('user_id', Auth::id());
        } elseif (auth()->user()->hasRole('Warga2')) {
            return $query->where('user_id', Auth::id());
        } elseif (auth()->user()->hasRole('RT1')) {
            return $query->whereHas('user.roles', function ($q) {
                $q->where('name', 'RT1')->orWhere('name', 'Warga');
            });
        } elseif (auth()->user()->hasRole('RT2')) {
            return $query->whereHas('user.roles', function ($q) {
                $q->where('name', 'RT2')->orWhere('name', 'Warga2');
            });
        } elseif (auth()->user()->hasRole('RW')) {
            return $query;
        }

        return $query;
    }
}
