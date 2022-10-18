<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopリスト</title>
  <link href="../../css/reset.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
  <header>
    <div class="header-left">
      <button type="button" class="menu-btn">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </button>
      <div class="group_name">Rese</div>
      <div class="menu">
        @auth
        <div class="menu__item"><a href="./" class="nav-menu">HOME</a></div>
        <form method="post" action="{{ route('logout') }}" class="menu__item">
          @csrf
          <a class="nav-menu" :href="route('login')" onclick="event.preventDefault();
            this.closest('form').submit();">
            {{ __('LOGOUT') }}
          </a>
        </form>
        <div class="menu__item"><a href="mypage" class="nav-menu">MY PAGE</a></div>
        @endauth
        @guest
        <div class="menu__item"><a href="./" class="nav-menu">HOME</a></div>
        <div class="menu__item"><a href="./register" class="nav-menu">REGISTRATION</a></div>
        <div class="menu__item"><a href="./login" class="nav-menu">LOGIN</a></div>
        @endguest
      </div>
    </div>

    <form action="/search" method="get" class="w-full max-w-3xl">
      @csrf
      <div class="flex -mx-4 form-flex">
        <div class="w-full md:w-1/5 px-1 mb-6 md:mb-0">
          <div class="relative">
            <select name="area_id" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
              <option value="" selected>All area</option>
              @foreach($areas as $area)
              <option value="{{ $area->id }}">{{ $area->name }}</option>
              @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
              </svg>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/5 px-1 mb-6 md:mb-0">
          <div class="relative">
            <select name="genre_id" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
              <option value="" selected>All genre</option>
              @foreach($genres as $genre)
              <option value="{{ $genre->id }}">{{ $genre->name }}</option>
              @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
              </svg>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/3 px-1 mb-6 md:mb-0">
          <input name="name" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="">
        </div>
        <button class="shadow bg-teal-500 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-5 rounded" type="submit">
          検索
        </button>
      </div>
    </form>
  </header>


  <div class="grid grid-cols-4 gap-5 p-10">
    @foreach($shops as $shop)
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-gray-100">
      <img class="w-full" src="{{ $shop->url }}">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2"> {{ $shop->name }}</div>
      </div>
      <div class="px-6 pb-2">
        <span class="inline-block bg-blue-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-100 mr-2 mb-2">#{{ $shop->area->name }}</span>
        <span class="inline-block bg-blue-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-100 mr-2 mb-2">#{{ $shop->genre->name }}</span>
      </div>
      <form action="{{ route('shop.detail', ['id' => $shop->id]) }}" method="post">
        @csrf
        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-normal hover:text-white py-2 px-4 mb-6 mt-3 ml-6 text-sm border border-blue-500 hover:border-transparent rounded">
          詳しく見る
        </button>
      </form>
    </div>
    @endforeach
  </div>


  <script src="https://cdn.tailwindcss.com"></script>
  <script src="js/main.js"></script>
</body>

</html>