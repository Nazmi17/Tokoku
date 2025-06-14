<?php

namespace App\Filament\Widgets;

use App\Models\Pengeluaran;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PengeluaranCard extends BaseWidget
{
    protected int | string | array $columns = 2;
    protected static string $maxWidth = 'full';

    protected function getStats(): array
    {
        $totalPengeluaran = Pengeluaran::all()->sum('jumlah');

        return [
              Stat::make('Pengeluaran', 'Rp ' . number_format($totalPengeluaran, 0, ',', '.'))
                ->description('Total seluruh pengeluaran')
                ->color('danger')
                
        ];
    }
}
