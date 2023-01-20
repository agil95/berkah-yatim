<header id="header" class="bg-blue-800 sticky top-0">
  <nav class="container w-container flex items-center justify-between flex-wrap px-4 mx-auto py-3">
    <div class="logo-header flex items-center flex-shrink-0 text-white md:mr-6">
      <a href="{{ urL('/') }}/?utm_source=logo-header">
        <img class="logo" src="{{ asset('dist/img/berkahyatim.png') }}" alt="Logo berkahyatim.com">
      </a>
    </div>
    <div class="md:pl-5 md:w-1/2 w-1/2 search">
      <div class="relative text-right"><button type="button" class="button-search px-3 py-2"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none">
            <rect width="100%" height="100%"></rect>
            <g class="currentLayer">
              <path d="M13.533 12.467l-2.55-2.542A5.94 5.94 0 0012.25 6.25a6 6 0 10-6 6 5.94 5.94 0 003.675-1.268l2.542 2.55a.75.75 0 001.23-.244.751.751 0 00-.164-.82zM1.75 6.25a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0z" fill="#fff"></path>
            </g>
          </svg></button>
        <div class="relative search-responsive text-left">
          <div class="absolute top-0 left-0 ml-4 mt-3"><svg width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.533 14.467l-2.55-2.542A5.94 5.94 0 0014.25 8.25a6 6 0 10-6 6 5.94 5.94 0 003.675-1.268l2.542 2.55a.75.75 0 001.23-.244.751.751 0 00-.164-.82zM3.75 8.25a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0z" fill="#AAA"></path>
            </svg></div><input type="text" id="search-bar" placeholder="Cari berkahyatim hari ini" class="pl-10 w-full h-10 rounded pr-10 md:pr-4 focus:outline-none search-input-header" autocomplete="off"><button type="button" class="closeSearch outline-none md:hidden h-10 w-10 absolute top-0 right-0">x</button>
        </div>
        <div class="search-list-container bg-white border border-solid border-gray-400 shadow-md p-5 absolute left-0 w-full rounded mt-3 hidden text-left">
          <div id="SearchKey" style="display:none">
            <h3 class="text-xs text-gray-900 mb-4" id="titleSearch"></h3>
          </div>
          <div id="SearchHistory" style="display:none">
            <h3 class="text-xs text-gray-900 mb-4">Pencarian Terakhir</h3>
          </div>
          <div id="SearchPopuler">
            <h3 class="text-xs text-gray-900 mb-4">Pencarian Populer</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="menuToggle block lg:hidden"><button class="flex items-center px-3 py-2 border rounded text-orange-200 border-orange-200 hover:text-white hover:border-white" id="MenuToggle"><svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <title>Menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg></button>
    </div>
    <div class="w-full hidden lg:text-right lg:block flex-grow lg:flex lg:items-center lg:w-auto" id="MenuContent">

      <div class="lg:flex-grow md:mx-6">
        <!-- <a href="https://www.berkahyatim.com/" class="block mt-4 lg:inline-block lg:mt-0 text-orange-100 hover:text-white mr-4">Cari Amalan</a> -->
      </div>
      <div>
        @if(Auth::check())
        <a href="{{ url('donatur/home') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-blue-900 hover:bg-white mt-4 lg:mt-0">Dashboard</a>
        @else
        <div><a href="{{ route('login') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-blue-900 hover:bg-white mt-4 lg:mt-0">Masuk / Daftar</a></div>
        @endif
      </div>
    </div>
  </nav>
</header>