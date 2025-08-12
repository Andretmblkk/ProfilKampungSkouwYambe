<?php

namespace App\Filament\Resources\Demografi;

use App\Filament\Resources\Demografi\UmurResource\Pages;
use App\Models\DataPenduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UmurResource extends Resource
{
    protected static ?string $model = DataPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Umur (nonaktif)';
    protected static ?string $navigationGroup = 'Data Penduduk';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('kategori')->default('umur'),
            Forms\Components\TextInput::make('label')->label('Rentang Umur')->required(),
            Forms\Components\TextInput::make('jumlah')->numeric()->required()->label('Jumlah'),
            Forms\Components\TextInput::make('satuan')->default('Jiwa')->label('Satuan'),
            Forms\Components\Toggle::make('is_active')->default(true)->label('Aktif'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->modifyQueryUsing(function ($query) {
            $query->where('kategori', 'umur');
        })->columns([
            Tables\Columns\TextColumn::make('label')->label('Rentang'),
            Tables\Columns\TextColumn::make('jumlah')->label('Jumlah')->sortable(),
            Tables\Columns\IconColumn::make('is_active')->boolean()->label('Status'),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUmur::route('/'),
        ];
    }
}


