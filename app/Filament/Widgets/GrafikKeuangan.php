<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GrafikKeuangan extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pemasukan & Pengeluaran per Bulan';

    protected int | string | array $columns = 2;

    protected function getData(): array
    {
        $pemasukan = DB::table('pemasukan')
            ->selectRaw('MONTH(tanggal) as bulan, SUM(jumlah) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->where('user_id', Auth::id());

        $pengeluaran = DB::table('pengeluaran')
            ->selectRaw('MONTH(tanggal) as bulan, SUM(jumlah) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->where('user_id', Auth::id());

        // label bulan
        $labels = [];
        $pemasukanData = [];
        $pengeluaranData = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date('F', mktime(0, 0, 0, $i, 10));
            $pemasukanData[] = $pemasukan[$i] ?? 0;
            $pengeluaranData[] = $pengeluaran[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pemasukan',
                    'data' => $pemasukanData,
                    'backgroundColor' => '#10B981',
                    'borderColor' => '#10B981',
                    'fill' => false,
                ],
                [
                    'label' => 'Pengeluaran',
                    'data' => $pengeluaranData,
                    'backgroundColor' => '#EF4444',
                    'borderColor' => '#EF4444',
                    'fill' => false,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; 
    }
}

