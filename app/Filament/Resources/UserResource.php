<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Role;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';
    protected static ?int $navigationSort = 1;
//    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        if (auth()->user()->hasRole('RT1') || auth()->user()->hasRole('RT2') || auth()->user()->hasRole('RW')) {
            $additionalSchema = [
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('NIK')->required(),
                TextInput::make('KK')->required(),
                TextInput::make('tempat_lahir')->required(),
                DatePicker::make('tanggal_lahir')->required(),
                Select::make('agama')->options([
                    'Islam' => 'Islam',
                    'Kristen' => 'Kristen',
                    'Katolik' => 'Katolik',
                    'Hindu' => 'Hindu',
                    'Budha' => 'Budha',
                    'Konghucu' => 'Konghucu'
                ]),
                Select::make('status_perkawinan')->options([
                    'Belum Kawin' => 'Belum Kawin',
                    'Kawin' => 'Kawin',
                    'Cerai Hidup' => 'Cerai Hidup',
                    'Cerai Mati' => 'Cerai Mati',
                    'Kawin Belum Tercatat' => 'Kawin Belum Tercatat',
                ]),
                Select::make('status_hubungan')->options([
                    'Kepala Keluarga' => 'Kepala Keluarga',
                    'Istri' => 'Istri',
                    'Anak' => 'Anak',
                ]),
                TextInput::make('pekerjaan')->required(),
                Select::make('tipe_warga')->options([
                    'Domisili Lokal' => 'Domisili Lokal',
                    'Non Domisili Lokal' => 'Non Domisili Lokal',
                ]),
                Select::make('jenis_kelamin')->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',
                ]),
                Select::make('golongan_darah')->options([
                    'A' => 'A',
                    'B' => 'B',
                    'AB' => 'AB',
                    'O' => 'O',
                ]),
                TextInput::make('alamat')->required(),
            ];

            $baseSchema = array_merge([
                Card::make()->schema($additionalSchema)->columns(2)
            ]);

        } elseif (auth()->user()->hasRole('Admin')) {
            $additionalSchema = [
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('username')->required()->maxLength(255),
                TextInput::make('password')->password()
                    ->required(fn(Page $livewire) => ($livewire instanceof CreateUser))
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->dehydrated(fn($state) => filled($state)),
                Select::make('roles')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->options(function () {
                        return Role::where('name', '!=', 'admin')->pluck('name', 'id');
                    })
                    ->preload(),
                Select::make('permissions')
                    ->multiple()
                    ->relationship('permissions', 'name')
                    ->preload(),
            ];
            $baseSchema = array_merge([
                Card::make()->schema($additionalSchema)->columns(2)
            ]);
        }

        return $form->schema($baseSchema);
    }

    public static function table(Table $table): Table
    {
        if (auth()->user()->hasRole('RT1') || auth()->user()->hasRole('RT2') || auth()->user()->hasRole('RW')) {
            $additionalColumn = [
                TextColumn::make('name')
                ->label('Name')
                ->sortable()
                ->searchable(),
                TextColumn::make('NIK')
                    ->label('NIK')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('KK')
                    ->label('KK')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tempat_lahir')
                    ->label('Tempat Lahir')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('agama')
                    ->label('Agama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status_perkawinan')
                    ->label('Status Perkawinan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status_hubungan')
                    ->label('Status Hubungan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('pekerjaan')
                    ->label('Pekerjaan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tipe_warga')
                    ->label('Tipe Warga')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('golongan_darah')
                    ->label('Golongan Darah')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->sortable()
                    ->searchable(),
            ];
            $baseColumn = array_merge($additionalColumn);

        } elseif (auth()->user()->hasRole('Admin')) {
            $additionalColumn = [
                TextColumn::make('id')
                    ->label('Id')
                    ->sortable()
                    ->searchable(), TextColumn::make('username')
                    ->label('Username')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Name')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
//            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();

        if ($user->hasRole('RT1')) {
            return User::query()->whereHas('roles', function ($q) {
                $q->where('name', 'RT1')->orWhere('name', 'warga');
            });
        }

        if ($user->hasRole('RT2')) {
            return User::query()->whereHas('roles', function ($q) {
                $q->where('name', 'RT2')->orWhere('name', 'warga2');
            });
        }

        return parent::getEloquentQuery()->where('name','!=', 'Admin');


    }
}
