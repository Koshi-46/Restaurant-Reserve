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
  </header>

  <div class="flex justify-between shop-detail mt-5">
    <div class="max-w-lg rounded overflow-hidden shadow-lg bg-gray-100 detail">
      <img class="w-full" src="{{ $shops->url }}">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2"> {{ $shops->name }}</div>
      </div>
      <div class="px-6 pb-2">
        <span class="inline-block bg-blue-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-100 mr-2 mb-2">#{{ $shops->area->name }}</span>
        <span class="inline-block bg-blue-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-100 mr-2 mb-2">#{{ $shops->genre->name }}</span>
      </div>
      <div class="px-6 py-4">
        <div class="text-base mb-2"> {{ $shops->explain }}</div>
      </div>
      <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-normal hover:text-white py-2 px-4 mb-6 mt-1 ml-6 text-sm border border-blue-500 hover:border-transparent rounded" type="button" onclick="history.back()">
        戻る
      </button>
    </div>

    @auth
    <div class="w-full max-w-sm mt-10">
      <form action="{{ route('reserve.store') }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <input type="hidden" name="shop_id" value="{{ $shops->id }}">
        <div class="py-4">
          <div class="font-bold text-xl mb-2">予約</div>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="date">
            日付
          </label>
          <input name="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="date" placeholder="Username" required>
        </div>

        <div class="mb-4 relative">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="time">
            時間
          </label>
          <input name="time" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" required />
        </div>

        <div class="mb-6 relative">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="member">
            人数
          </label>
          <input name="member" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" required type="number" />
          <!-- <div class="pointer-events-none absolute top-10 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
          </div> -->
        </div>
        
        <div class="flex items-center justify-between">
          <input class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="追加" />
        </div>
      </form>
    </div>
    @endauth


  </div>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="js/main.js"></script>
</body>

</html>