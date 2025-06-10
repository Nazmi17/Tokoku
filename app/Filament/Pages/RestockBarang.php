<?php

namespace App\Filament\Pages;


use App\Models\Barang;
use App\Models\Restock_log;
use Illuminate\Support\Facades\Auth;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\{
    Repeater, Select, TextInput, Textarea
};
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;

class RestockBarang extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Restock Barang';
    protected static string $view = 'filament.pages.restock-barang';

    public ?array $data = [];

    public function mount (): void
    {
        $this->form->fill();
    }

    public function getFormSchema(): array
    {
        return [
            Repeater::make('data')
                ->label('Daftar barang yang akan di restock')
                ->schema([
                    Select::make('barang_id')
                        ->label('Barang')
                        ->options(Barang::all()->pluck('nama_barang', 'id_barang'))
                        ->searchable()
                        ->required(),
                    TextInput::make('jumlah')
                        ->label('Jumlah')
                        ->numeric()
                        ->minValue(1)
                        ->required(),
                    Textarea::make('catatan')
                        ->label('Catatan (opsional)')
                        ->rows(2)
                        ->nullable(),
                ])
                ->columns(1)
                ->createItemButtonLabel('Tambah Barang')
                ->required(),
            ];
    }

    protected function getFormActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('submit')
                ->label('Simpan Restock')
                ->submit('submit'),     
        ];
    }
    public function submit()
    {
        $userID = Auth::id();
        $items = collect($this->form->getState()['data']);

        foreach($items as $item){
            $barang = Barang::FindOrFail($item['barang_id']);
            $jumlah = (int) $item['jumlah'];

            $barang->increment('stok', $jumlah);

            Restock_log::create([
                'barang_id' => $barang->id_barang,
                'jumlah' => $jumlah,
                'harga_beli' => $barang->harga_beli,
                'total' => $barang->harga_beli * $jumlah,
                'catatan' => $item['catatan'] ?? null,
                'user_id' => $userID,
                'created_at' => now(),
            ]);
        }

        Notification::make()
            ->title('Berhasil')
            ->body('Barang berhasil di restock')
            ->success()
            ->send();   

        // $this->form->reset();
        $this->form->fill();
    }

    protected function getFormModel(): string
    {
        return static::class;
    }
}
