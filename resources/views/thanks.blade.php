<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../../css/reset.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body x-data="{ open: false }">
    <header>
        <button type="button" class="menu-btn" x-on:click="open=!open">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <div class="group_name">Rese</div>
        <div class="menu" x-bind:class="{'is-active' : open }">
            <div class="menu__item"><a href="./" class="nav-menu">HOME</a></div>
            <div class="menu__item"><a href="./register" class="nav-menu">REGISTRATION</a></div>
            <div class="menu__item"><a href="./login" class="nav-menu">LOGIN</a></div>
        </div>
    </header>
    <x-auth-card>
        <div class="p-6 bg-white border-b border-gray-200">
            会員登録ありがとうございます
        </div>
        <x-button class="ml-4">
            <a href="/">戻る</a>
        </x-button>
    </x-auth-card>
    <!-- <x-app-layout>
   

       

       
    </x-app-layout> -->
</body>

</html>