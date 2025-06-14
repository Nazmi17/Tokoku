<?php

namespace App\Filament\Widgets;

use App\Models\Barang;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class RevenueCard extends BaseWidget
{
    protected int | string | array $columns = 2;

    protected function getStats(): array
    {
        
        $totalPemasukan = Pemasukan::where('user_id', Auth::id())->sum('jumlah');
        $totalPengeluaran = Pengeluaran::where('user_id', Auth::id())->sum('jumlah');
        $totalBarang = Barang::where('user_id', Auth::id())->count();

        return [
            Stat::make('Pemasukan', 'Rp ' . number_format($totalPemasukan, 0, ',', '.'))
                ->description('Total seluruh pemasukan')
                ->color('success'),

            Stat::make('Pengeluaran', 'Rp ' . number_format($totalPengeluaran, 0, ',', '.'))
                ->description('Total seluruh pengeluaran')
                ->color('danger'),

            Stat::make('Barang:', $totalBarang)
                ->description('Total seluruh barang')
                ->color('warning'),
        ];
    }
}
