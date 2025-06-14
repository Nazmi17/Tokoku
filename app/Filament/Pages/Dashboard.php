<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\GrafikKeuangan;
use App\Filament\Widgets\PengeluaranCard;
use App\Filament\Widgets\RevenueCard;
use App\Filament\Widgets\WelcomeWidget;
use App\Models\Pengeluaran;
use Filament\Widgets\Widget;
use Filament\Facades\Filament;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\WidgetConfiguration;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
   protected static ?string $navigationIcon = 'heroicon-o-home';

     protected static ?string $title = 'Beranda';
    protected static ?string $navigationLabel = 'Beranda';

    protected static string $view = 'filament.pages.dashboard';

     public function getWidgets(): array
    {
        return Filament::getWidgets();
    }

    /**
     * @return array<class-string<Widget> | WidgetConfiguration>
     */
    public function getVisibleWidgets(): array
    {
        return $this->filterVisibleWidgets($this->getWidgets());
    }


    protected function getHeaderWidgets(): array
    {
        return [
            AccountWidget::class,
            WelcomeWidget::class,
            RevenueCard::class,
            // GrafikKeuangan::class
            // PengeluaranCard::class,
        ];
    }
}
