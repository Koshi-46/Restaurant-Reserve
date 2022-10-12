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
    <x-guest-layout>
        <x-auth-card class="card">
            <!-- <x-slot name="logo">
            </x-slot> -->

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('パスワードをお忘れですか') }}
                    </a>
                    @endif

                    <x-button class="ml-3">
                        {{ __('ログイン') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
</body>

</html>