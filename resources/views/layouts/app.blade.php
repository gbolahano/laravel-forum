<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @if($errors->count() > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger"> {{ $error }} </div>
                    @endforeach
                
            @endif
        </div>

        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-4">
                    <a href=" {{ route('discussion.create') }} " class=" mb-3 form-control btn btn-primary">Create a new discussion</a>
                    <div class="card mb-3">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"> <a style="text-decoration:none;" href=" {{ route('forum') }} ">Home</a> </li>                              
                                <li class="list-group-item"> <a style="text-decoration:none;" href="/forum?filter=me">My discussions</a> </li>                              
                                <li class="list-group-item"> <a style="text-decoration:none;" href="/forum?filter=solved">Answered discussions</a> </li>                              
                                <li class="list-group-item"> <a style="text-decoration:none;" href="/forum?filter=unsolved">Unanswered discussions</a> </li>                     
                            </ul>
                        </div>
                        
                        @if(Auth::check())
                            @if(Auth::User()->admin)
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item"> <a style="text-decoration:none;" href=" /channels ">All channels</a> </li>                                       
                                    </ul>
                                </div>
                            @endif
                        @endif
                    </div>

                    <div class="card">
                        <div class="card-header">Channels</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($channels as $channel)
                                    <li class="list-group-item"> <a style="text-decoration:none;" href=" {{ route('channel', ['slug' => $channel->slug]) }} ">{{ $channel->title }}</a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                        @yield('content')
                </div>
            </div>
        </div>
        
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}')
        @endif
    </script>
</body>
</html>
