<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Illuminate\Support\Str;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $modelLabel = 'Berita & Kegiatan';
    protected static ?string $pluralModelLabel = 'Berita & Kegiatan';
    protected static ?string $navigationLabel = 'Berita & Kegiatan';
    protected static ?string $navigationGroup = 'Konten Kampung';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required(),
                Forms\Components\Textarea::make('excerpt')
                    ->label('Ringkasan')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('content')
                    ->label('Konten')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('featured_image')
                    ->label('Gambar Utama')
                    ->image()
                    ->disk('public')
                    ->directory('articles')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth(1600)
                    ->imageResizeTargetHeight(900)
                    ->imageResizeUpscale(false)
                    ->imagePreviewHeight('250')
                    ->getUploadedFileNameForStorageUsing(function ($file): string {
                        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $ext = $file->getClientOriginalExtension();
                        return Str::slug($name) . '-' . time() . '.' . $ext;
                    }),
                Forms\Components\Toggle::make('is_published')
                    ->label('Publikasi')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Tanggal Publikasi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('featured_image')
                    ->label('Gambar'),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->dateTime()
                    ->sortable(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
