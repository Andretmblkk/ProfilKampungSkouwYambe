<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataPendudukResource\Pages;
use App\Models\DataPenduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DataPendudukResource extends Resource
{
    protected static ?string $model = DataPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = 'Data Penduduk';
    protected static ?string $pluralModelLabel = 'Data Penduduk';
    protected static ?string $navigationLabel = 'Data Penduduk';
    protected static ?string $navigationGroup = 'Konten Kampung';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kategori')
                    ->label('Kategori')
                    ->helperText('contoh: umur, perkawinan, pekerjaan, pendidikan, agama, total_penduduk, kepala_keluarga')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('label')
                    ->label('Label')
                    ->helperText('contoh: 0-5, 6-17, 18-40, Kawin, Petani, Kristen, dsb')
                    ->maxLength(150),
                Forms\Components\TextInput::make('jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('satuan')
                    ->label('Satuan')
                    ->placeholder('Jiwa / KK / ...')
                    ->maxLength(50),
                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('label')
                    ->label('Label')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->sortable(),
                Tables\Columns\TextColumn::make('satuan')
                    ->label('Satuan')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataPenduduks::route('/'),
            'create' => Pages\CreateDataPenduduk::route('/create'),
            'edit' => Pages\EditDataPenduduk::route('/{record}/edit'),
        ];
    }
}


