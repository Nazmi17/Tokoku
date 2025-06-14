<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Barang;
use Filament\Forms\Form;
use App\Models\Pemasukan;
use App\Models\Transaksi;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Schema;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TransaksiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TransaksiResource\RelationManagers;
use App\Filament\Resources\TransaksiDetailRelationManagerResource\RelationManagers\TransaksiResourceRelationManager;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['total_harga'] = collect($data['transaksi_detail'] ?? [])
            ->sum('subtotal');

        // Buat kembalian = dibayar - total
        $data['kembalian'] = ($data['dibayar'] ?? 0) - $data['total_harga'];
        // $data['user_id'] = Auth::id();
        return $data;
    }

    public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->where('user_id', Auth::id()); // Hanya tampilkan transaksi milik user login
}
    
    public static function form(Form $form): Form   
    {
        return $form
            ->schema([
                  TextInput::make('dibayar')
                ->label('Dibayar')
                ->numeric()
                ->required()
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                    $total = collect($get('transaksi_detail'))->sum('subtotal') ?? 0;
                    $set('kembalian', $state - $total);
                }),

            TextInput::make('total_harga')
                ->label('Total Harga (Rp.')
                ->numeric()
                ->disabled()
                ->dehydrated()
                ->reactive(),

            TextInput::make('kembalian')
                ->label('Kembalian (Rp.)')
                ->numeric()
                ->disabled()
                ->dehydrated(),

             Hidden::make('user_id')
                ->default(Auth::id()),
            Repeater::make('transaksi_detail')
                ->label('Transaksi detail')
                ->relationship('transaksi_detail')
                ->schema([
                    Select::make('barang_id')
                    ->label('Barang')
                    ->options(function () {
                        return \App\Models\Barang::where('user_id', Auth::id())
                            ->pluck('nama_barang', 'id_barang');
                    })
                    ->searchable()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $barang = \App\Models\Barang::find($state);
                        if ($barang) {
                            $set('harga_satuan', $barang->harga_jual);
                        }
                    }),


                    TextInput::make('qty')
                        ->label('Qty')
                        ->numeric()
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            $harga = $get('harga_satuan') ?? 0;
                            $subtotal = $state * $harga;
                            $set('subtotal', $subtotal);

                            $detail = $get('../../transaksi_detail'); 
                            $total = collect($detail)->sum('subtotal');
                            $dibayar = $get('../../dibayar') ?? 0;

                            $set('../../total_harga', $total);
                            $set('../../kembalian', $dibayar - $total);
                        }),


                    TextInput::make('harga_satuan')
                        ->label('Harga Satuan')
                        ->numeric()
                        ->disabled()
                        ->dehydrated(),

                    TextInput::make('subtotal')
                        ->label('Subtotal')
                        ->numeric()
                        ->disabled()
                        ->dehydrated(),

                    Hidden::make('user_id')
                        ->default(Auth::id()),
                ])
                ->createItemButtonLabel('Tambah Barang')
                ->columns(4)
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                    $total = collect($state)->sum('subtotal');
                    $set('total_harga', $total);

                    $dibayar = $get('dibayar') ?? 0;
                    $set('kembalian', $dibayar - $total);
                }),
            ]); 
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rowIndex')
                    ->label('No.')
                    ->rowIndex()
                    ->sortable(false),
                // TextColumn::make('user.name')->label('User'),
                TextColumn::make('total_harga')->label('Total Harga')->money('IDR', true),
                TextColumn::make('dibayar')->label('Dibayar')->money('IDR', true),
                TextColumn::make('kembalian')->label('Kembalian')->money('IDR', true),
                TextColumn::make('created_at')->label('Tanggal')->dateTime('d M Y H:i'),
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
             TransaksiResourceRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}
