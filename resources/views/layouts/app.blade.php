<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flame.css')}}" name="flame-css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css')}}" name="admin-css">
    
    <!-- Styles -->
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-top navbar-expand navbar-fixed-top" role="navigation" style="padding: 0;">
        <div class="container-fluid">
            <div class="navbar-brand">
                <a class="logo" href="{{ url('/') }}">
                    <i class="fas fa-utensils" style="font-size: 2rem;"></i>
                </a>
            </div>
            @yield('page-title')
            <div class="navbar navbar-right">
                <button
                    type="button"
                    class="navbar-toggler"
                    data-toggle="collapse"
                    data-target="#navSidebar"
                    aria-controls="navSidebar"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="fa fa-bars"></span>
                </button>
                @if (Auth::check()) 
                <navi></navi>
                
                
                @endif     
            </div>
        </div>
    </nav>
    @if (Auth::check())
    <sidebar></sidebar>

    @endif  
    <div class="page-wrapper">
        <div class="row-fluid">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
