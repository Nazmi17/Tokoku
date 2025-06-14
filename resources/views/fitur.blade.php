<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tokomu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

</head>
<body >
<div class=" bg-gray-950 h-96">
<div class=" bg-gray-950 min-h-screen">
  <header class="relative flex max-w-screen-xl flex-col overflow-hidden text-blue-900 md:mx-auto md:flex-row md:items-center border-b-2 border-golden">
    <a href="{{ route('beranda') }}" class="flex cursor-pointer items-center whitespace-nowrap text-2xl font-black text-golden">
      <img src="{{ asset('images/logo.png') }}" alt="" class="w-36 h-36">
      Tokoku
    </a>
    <input type="checkbox" class="peer hidden" id="navbar-open" />
    <label class="absolute top-5 right-7 cursor-pointer md:hidden text-blue-600" for="navbar-open">
      <span class="sr-only">Toggle Navigation</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </label>
    <nav aria-label="Header Navigation" class="peer-checked:mt-8 peer-checked:max-h-56 flex max-h-0 w-full flex-col items-center justify-between overflow-hidden transition-all md:ml-24 md:max-h-full md:flex-row md:items-start">
      <ul class="flex flex-col items-center space-y-2 md:ml-auto md:flex-row md:space-y-0">
        <li class="font-bold text-golden md:mr-12"><a href="{{ route('fitur') }}">Fitur</a></li>
        <li class="md:mr-12">
             @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/tokoku') }}"
                            class="inline-block px-5 py-1.5 dark:text-golden border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-golden text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-golden border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </li>
      </ul>
    </nav>
  </header>

  <section class="bg-gray-950 px-4 py-20 text-white">
  <div class="mx-auto max-w-screen-xl">
    <h2 class="mb-16 text-center text-4xl font-bold">Fitur Unggulan Tokoku</h2>
    <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
      <!-- Fitur 1 -->
      <div class="flex flex-col items-center text-center border border-golden hover:transform hover:scale-105">
        <img src="{{ asset('images/transaksi.png') }}" alt="Fitur Kasir" class="mb-6 w-full h-full object-contain" />
        <h3 class="mb-2 text-xl font-semibold text-orange-400">Fitur Kasir</h3>
        <p class="text-gray-400 text-sm">
          Mempermudah proses transaksi penjualan dengan input barang otomatis, pengurangan stok, dan perhitungan kembalian.
        </p>
      </div>
      <!-- Fitur 2 -->
      <div class="flex flex-col items-center text-center border border-golden hover:transform hover:scale-105">
        <img src="{{ asset('images/Restock.png') }}" alt="Restock Barang" class="mb-6 w-full h-full object-contain" />
        <h3 class="mb-2 text-xl font-semibold text-orange-400">Restock Barang</h3>
        <p class="text-gray-400 text-sm">
          Catat pada saat anda merestock barang anda.
        </p>
      </div>
      <!-- Fitur 3 -->
      <div class="flex flex-col items-center text-center border border-golden hover:transform hover:scale-105">
        <img src="{{ asset('images/Barang.png') }}" alt="Manajemen Barang" class="mb-6 w-ful; h-full object-contain" />
        <h3 class="mb-2 text-xl font-semibold text-orange-400">Manajemen Barang</h3>
        <p class="text-gray-400 text-sm">
          Tambah, ubah, dan kelola data barang Anda termasuk harga beli, stok, dan kategori dengan antarmuka yang ramah pengguna.
        </p>
      </div>
      <!-- Fitur 4 -->
      <div class="flex flex-col items-center text-center border border-golden hover:transform hover:scale-105">
        <img src="{{ asset('images/Grafik.png') }}" alt="Laporan Keuangan" class="mb-6 w-full h-full object-contain" />
        <h3 class="mb-2 text-xl font-semibold text-orange-400">Laporan Keuangan</h3>
        <p class="text-gray-400 text-sm">
          Ringkasan pemasukan, pengeluaran, dan performa warung melalui grafik dan laporan yang mudah dipahami.
        </p>
      </div>
    </div>
  </div>
</section>



    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
