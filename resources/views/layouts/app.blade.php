<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    body {
        max-height: 100vh;
    }

    .allBG {
        background-image: url("bg-image.webp");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position-x: center;
    }

    .inputSearchBars {
        min-width: 330px;
    }

    a:link {
        padding: 5px;
        text-decoration: none;
        border-radius: 20px;
    }

    .active {
        color: #F69400;
    }

    .btn:hover {
        background-color: #F69400;
    }


    @media (max-width: 1100px) {
        .dsplyswitch {
            display: none;
        }
    }
    </style>
</head>

<body class="allBG">
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark text-light sticky-top py-4">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div style="position:abosolute;left: 10px;top:5px;margin:0;z-index:3">
                        <img src="logo.png" alt="hanaptrabahologo" width="200px" height="auto">
                        {{-- {{ config('app.name') }} --}}
                    </div>
                </a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                          @if (Route::has('login'))
                            @auth
                            <div class="text-light">
                              <a href="{{ url('/') }}"
                                class="{{ Request::path() === '/' ? 'active' : 'text-light' }}">Home</a>
                              <a href="{{ url('/home') }}"
                                class="{{ Request::path() === 'home' ? 'active' : 'text-light' }}"> Dashboard</a>
                            </div>
                            @endauth
                          @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><button
                                    class="btn btn-warning rounded-pill btn-sm">{{ __('Login') }}</button></a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><button
                                    class="btn btn-warning rounded-pill btn-sm">{{ __('Register') }}</button></a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-warning" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="text-white d-flex justify-content-center align-items-center">
            <p class="mt-3">Copyright © 2023 | </p><span class="ms-2"><a href="{{ url('/') }}"><img src="logo.png"
                        alt="hanaptrabahologo" width="150px" height="auto"></a></span>
        </footer>
    </div>
</body>

</html>