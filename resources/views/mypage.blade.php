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

  <div class="flex">
    <div class="w-1/3">
      @foreach($reserves as $reserve)
      <div class="block p-6 m-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <table class="table-auto">
          <thead>
            <tr>
              <th class="p-3 border-spacing-x-px">予約{{$reserve->id}}</th>
              <th class="p-3">
                <form action="{{ route('reserve.change', ['id' => $reserve->id]) }}" method="post">
                  @csrf
                  <button class="text-xs bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded-full">
                    予約変更
                  </button>
                </form>
              </th>
              <th class="p-3">
                <form action="{{ route('reserve.delete', ['id' => $reserve->id]) }}" method="post">
                  @csrf
                  <button class="text-xs bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded-full">
                    キャンセル
                  </button>
                </form>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="pr-3">Shop</th>
              <td>{{$reserve->shop->name}}</td>
            </tr>
            <tr>
              <th class="pr-3">Date</th>
              <td>{{$reserve->date}}</td>
            </tr>
            <tr>
              <th class="pr-3">Time</th>
              <td>{{$reserve->time}}</td>
            </tr>
            <tr>
              <th class="pr-3">Number</th>
              <td>{{$reserve->member}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      @endforeach
    </div>
    <div class="grid grid-cols-3 gap-5 p-10 w-2/3 h-1/2">
      @foreach($nices as $nice)
      <div class="max-w-sm rounded overflow-hidden shadow-lg bg-gray-100">
        <img class="w-full" src="{{ $nice->shop->url }}">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2"> {{ $nice->shop->name }}</div>
        </div>
        <div class="px-6 pb-2">
          <span class="inline-block bg-blue-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-100 mr-2 mb-2">#{{ $nice->shop->area->name }}</span>
          <span class="inline-block bg-blue-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-100 mr-2 mb-2">#{{ $nice->shop->genre->name }}</span>
        </div>
        <div class="flex justify-between items-center">
          <form action="{{ route('shop.detail', ['id' => $nice->shop->id]) }}" method="post">
            @csrf
            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-normal hover:text-white py-2 px-4 mb-6 mt-3 ml-6 text-sm border border-blue-500 hover:border-transparent rounded">
              詳しく見る
            </button>
          </form>
          @auth
          @if(!$nice->shop->is_liked_by_auth_user())
          <form action="{{ route('shop.like') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $nice->shop->id }}">
            <button class="like pr-3"><img class="like_img" src="/img/heart_1.png" alt=""></button>
          </form>
          @else
          <form action="{{ route('shop.unlike') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $nice->shop->id }}">
            <button class="unlike pr-3"><img class="unlike_img" src="/img/heart_2.png" alt=""></button>
          </form>
          @endif
          @endauth
        </div>

      </div>
      @endforeach
    </div>
  </div>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="js/main.js"></script>
</body>

</html>