<?php

namespace App\Filament\Resources\TransaksiResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\TransaksiResource;

class CreateTransaksi extends CreateRecord
{
    protected static string $resource = TransaksiResource::class;

 protected function afterCreate(): void
{
    $record = $this->record;

    // Kurangi stok barang
    foreach ($record->transaksi_detail as $detail){
        $barang = $detail->barang;
        $barang->stok -= $detail->qty;
        $barang->save();
    }

    \App\Models\Pemasukan::create([
        'transaksi_id' => $record->id_transaksi,
        'jumlah' => $record->total_harga,
        'sumber' => 'Penjualan', 
        'tanggal' => now()->toDateString(),
        'user_id' => $record->user_id,
    ]);
}


}
