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

  <div class="h-screen w-screen flex justify-center items-center">
    <div class="p-8 max-w-xl w-96 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
      <h5 class="pb-2 flex justify-center mb-2 text-xl tracking-tight text-gray-900 dark:text-white">ご予約が完了しました</h5>
      <div class="flex justify-center">
        <a href="/" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          戻る
        </a>
      </div>
    </div>
  </div>



  <script src="https://cdn.tailwindcss.com"></script>
  <script src="js/main.js"></script>
</body>

</html>