<?php
namespace App\Filament\Resources\TransaksiResource\Widgets;

use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Transaksi_detail;

class TransaksiDetailTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    // protected function getTableQuery()
    // {
    //     return Transaksi_detail::query()
    //         ->where('transaksi_id', $this->record->id_transaksi);
    // }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('barang.nama_barang')->label('Barang'),
            Tables\Columns\TextColumn::make('qty'),
            Tables\Columns\TextColumn::make('harga_satuan')->money('IDR'),
            Tables\Columns\TextColumn::make('subtotal')->money('IDR'),
        ];
    }
}
