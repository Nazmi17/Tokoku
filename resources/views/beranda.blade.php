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

  <div class="mx-auto h-full px-4 py-28 md:py-40 sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl lg:px-8">
    <div class="flex flex-col items-center justify-between lg:flex-row">
      <div class="">
        <div class="lg:max-w-xl lg:pr-5">
          <p class="flex text-sm uppercase text-golden">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 inline h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd" />
            </svg>
            Sebuah Website Untuk Pengelolaan Warung
          </p>
          <h2 class="mb-6 max-w-lg text-5xl font-bold leading-snug tracking-tight text-white sm:text-7xl sm:leading-snug">
            Tokoku, Membuat Pengelolaan Lebih
            <span class="my-1 inline-block border-b-8 border-white bg-golden px-4 font-bold text-white">Mudah</span>
          </h2>
          <p class="text-base text-gray-400">Dengan fitur-fitur yang terbaru, website ini akan memberikan anda pengalaman baru dalam mengelola website.</p>
        </div>
        <div class="mt-10 flex flex-col items-center md:flex-row">
          <a href="{{ route('fitur') }}" class="mb-3 inline-flex h-12 w-full items-center justify-center rounded bg-black border-2 border-golden px-6 font-medium tracking-wide text-golden shadow-md transition md:mr-4 md:mb-0 md:w-auto focus:outline-none hover:bg-golden hover:text-black">Fitur-fitur </a>
          <a href="{{ route('register') }}" aria-label="" class="group inline-flex items-center font-semibold text-golden"
            >Daftarkan akun anda
            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:translate-x-2 ml-4 h-6 w-6 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </a>
        </div>
      </div>
      <div class="relative hidden lg:ml-32 lg:block lg:w-1/2">
        <img src="{{ asset('images/Logo_beranda.png') }}" alt="">
      </div>
    </div>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
