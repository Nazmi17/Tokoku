<?php

namespace App\Filament\Widgets;

use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class JumlahBarang extends BaseWidget
{
    protected function getStats(): array
    {
         $totalPemasukan = Barang::all()->sum('jumlah')->where('user_id', Auth::id());

        return [
            Stat::make('Pemasukan', 'Rp ' . number_format($totalPemasukan, 0, ',', '.'))
                ->description('Total seluruh pemasukan')
                ->color('success')
                
        ];
    }
}
