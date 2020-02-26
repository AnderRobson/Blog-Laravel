<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">

    <title>{{config('app.name', 'Laravel')}}</title>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow navbar-expand-md">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">{{ config('app.name', 'Laravel') }}</a>

{{--            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
            <ul class="navbar-nav px-3 ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
            </ul>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="card border-primary">
                            {{--                <div class="card-header">{{ __('Login') }}</div>--}}

                            <div class="text-center mb-4">
                                <img class="mb-4 m-4" src="{{asset('img/logo.png')}}" alt="Icone da empresa/loja" width="90" height="90">
                            </div>
                                @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{asset('bootstrap/js/jquery.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</body>
</html>
