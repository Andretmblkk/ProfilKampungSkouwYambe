<?php

namespace App\Filament\Resources\Demografi;

use App\Filament\Resources\Demografi\PekerjaanResource\Pages;
use App\Models\DataPenduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PekerjaanResource extends Resource
{
    protected static ?string $model = DataPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Pekerjaan';
    protected static ?string $navigationGroup = 'Data Penduduk';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('kategori')->default('pekerjaan'),
            Forms\Components\TextInput::make('label')->label('Pekerjaan')->required(),
            Forms\Components\TextInput::make('jumlah')->numeric()->required()->label('Jumlah'),
            Forms\Components\TextInput::make('satuan')->default('Jiwa')->label('Satuan'),
            Forms\Components\Toggle::make('is_active')->default(true)->label('Aktif'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->modifyQueryUsing(fn(Builder $query) => $query->where('kategori', 'pekerjaan'))
            ->columns([
                Tables\Columns\TextColumn::make('label')->label('Pekerjaan'),
                Tables\Columns\TextColumn::make('jumlah')->label('Jumlah')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean()->label('Status Aktif'),
            ])->actions([
                Tables\Actions\EditAction::make(),
            ])->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePekerjaan::route('/'),
        ];
    }
}


