<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestockLogResource\Pages;
use App\Filament\Resources\RestockLogResource\RelationManagers;
use App\Models\Restock_log;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RestockLogResource extends Resource
{
    protected static ?string $model = Restock_log::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $label = 'Histori Restock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('barang.nama_barang')->label('Barang')->searchable(),
                TextColumn::make('jumlah')->label('Jumlah')->sortable(),
                TextColumn::make('harga_beli')->label('Harga Beli')->money('IDR'),
                TextColumn::make('total')->label('Total')->money('IDR'),
                TextColumn::make('catatan')->label('Catatan'),
                TextColumn::make('created_at')->label('Tanggal')->dateTime(),
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
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListRestockLogs::route('/'),
            // 'create' => Pages\CreateRestockLog::route('/create'),
            // 'edit' => Pages\EditRestockLog::route('/{record}/edit'),
        ];
    }
}
