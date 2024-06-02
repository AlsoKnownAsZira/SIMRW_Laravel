<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataAduanResource\Pages;
use App\Filament\Resources\DataAduanResource\RelationManagers;
use App\Models\data_aduan;
use App\Models\User;
use App\Models\DataAduan;
use Filament\Support\Colors\Color;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Support\Facades\Log;

//use Filament\Tables\Concerns

class DataAduanResource extends Resource
{
    protected static ?string $model = data_aduan::class;
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-s-flag';
    protected static ?string $navigationLabel = 'Data Aduan';

    public static function form(Form $form): Form
    {
        if (auth()->user()->hasRole(['Warga', 'Warga2'])) {
            $additionalSchema = [
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('konten')
                    ->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id())
                    ->required(),
            ];

            $baseSchema = array_merge([
                Card::make()->schema($additionalSchema)
            ]);
        } elseif (auth()->user()->hasRole(['Admin', 'RW', 'RT1', 'RT2'])) {
            $additionalSchema = [
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->disabled(fn($record) => $record !== null),
                Forms\Components\Textarea::make('konten')
                    ->required()
                    ->disabled(fn($record) => $record !== null),
                Select::make('status')->options([
                    'Valid' => 'Valid',
                    'Dalam Proses' => 'Dalam Proses',
                ]),
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id())
                    ->required()
                    ->disabled(fn($record) => $record !== null),
            ];

            $baseSchema = array_merge([
                Card::make()->schema($additionalSchema)
            ]);
        }

        return $form->schema($baseSchema);
    }

    public static function table(Table $table): Table
    {
        if (auth()->user()->hasRole(['Warga', 'Warga2', 'Admin', 'RT1', 'RT2', 'RW'])) {
            $additionalColumn = [
                TextColumn::make('User.name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('User.NIK')
                    ->label('NIK')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('judul')
                    ->label('Judul')
                    ->sortable()
                    ->searchable(),
//                TextColumn::make('status')
//                    ->label('Status')
//                    ->color(function($record) {
//                        Log::info('Status:', ['status' => $record->status]);
//                        if ($record->status == 'Valid') {
//                            return 'green';
//                        } elseif ($record->status == 'Dalam Proses') {
//                            return 'yellow';
//                        }
//                        return 'black'; // Default color
//                    })
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'Valid',
                        'warning' => 'Dalam Proses',
                    ])
                    ->sortable()
                    ->searchable(),
            ];
            $baseColumn = array_merge($additionalColumn);
        }

        return $table
            ->columns($baseColumn)
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
