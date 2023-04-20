<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="color-scheme-laravel admin">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark  shadow-sm" style="background: palevioletred; height: 100px" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/cosmetics') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @isset($categories)
                            @foreach($categories as $cat)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('cosmetics.category', $cat->id)}}">{{ $cat->{'name_'.app()->getLocale()} }}</a>
                                </li>
                            @endforeach
                        @endisset
{{--                        <h1>{{ app()->getLocale() }}</h1>--}}
                    </ul>




                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login.form'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login.form') }}">{{ __('message.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register.form'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register.form') }}">{{ __('message.register') }}</a>
                                </li>
                            @endif
                            @else
                                @if (Auth::user()->role->name == "admin")
                                    <li class="nav-item dropdown" >
                                        <a class="nav-link dropdown" href="{{route('emp.users.index')}}">
                                            {{ __('message.admin') }}
                                        </a>
                                    </li>
                                @endif
                                    @if (Auth::user()->role->name == "moderator")
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown" href="{{route('emp.categories.index')}}">
                                                {{ __('message.moderator') }}
                                            </a>
                                        </li>
                                    @endif


                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name}}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('message.logout') }}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                                </svg>
                                            </a>
                                            <a class="dropdown-item" href="{{route('cart.index')}}">{{ __('message.cart') }}  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
                                                    <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
                                                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
                                                </svg></a>

                                            <a class="dropdown-item" href="{{ route('users.balance', Auth::user()->id) }}">
                                                {{ __('message.payment') }}  <img src="https://cdn1.iconfinder.com/data/icons/shoping-cart/84/ShoppingCart15-1024.png" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            </a>

                                            <a class="dropdown-item" href="{{route('user.order')}}"> {{ __('message.order') }} <img src="data:image/png;base64,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" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16"> </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                        @endguest

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{config('app.languages')[app()->getLocale()]}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @foreach(config('app.languages') as $ln => $lang)
                                <a class="dropdown-item" href="{{route('switch.lang', $ln)}}">
                                    {{$lang}}
                                </a>
                                @endforeach
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
