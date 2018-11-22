<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width, shrink-to-fit=no"/>
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Oosh</title>

        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">

        <title>{{ config('app.name', 'Oosh') }}</title>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>
        <noscript>
            You need to enable JavaScript to run Oosh.
        </noscript>
        <div id="app"></div>
        <!-- <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="/" class="brand-logo">Oosh</a>  
                <ul class="right">
                    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </ul>              
            </div>
        </nav>

        <ul class="sidenav" id="nav-mobile">
            <li><a href="#">Navbar Link</a></li>
            @auth
                <li><a href="{{ url('/home') }}">Home</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            @endauth
        </ul> -->

        @yield('content')

        <!-- <footer class="page-footer orange">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Oosh</h5>
                        <p class="grey-text text-lighten-4">Oosh, that's Folkestone delivered. We are currently in a very early stage of development, so please bear with us.</p>
                        <p class="grey-text text-lighten-4">We're very interested in hearing from you - if you're a Folkestone business who wants to take part, a driver who wants to work with us or you would like to give us some feedback (or just want a chinwag), please send us an email <a href="mailto:help@oosh.it">help@oosh.it</a></p>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">About</h5>
                        <ul>
                            <li><a class="white-text" href="{{ route('pages.about') }}">About Us</a></li>
                            <li><a class="white-text" href="{{ route('pages.journal') }}">Journal</a></li>
                            <li><a class="white-text" href="{{ route('pages.jobs') }}">Work with us</a></li>
                            <li><a class="white-text" href="{{ route('pages.feedback') }}">Feedback</a></li>
                        </ul>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Smallprint</h5>
                        <ul>
                            <li><a class="white-text" href="{{ route('pages.legal.terms') }}">Terms and Conditions</a></li>
                            <li><a class="white-text" href="{{ route('pages.legal.privacy') }}">Privacy</a></li>
                            <li><a class="white-text" href="{{ route('pages.legal.cookies') }}">Cookies</a></li>
                            <li><a class="white-text" href="{{ route('pages.help') }}">Help & Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="orange-text text-lighten-3" href="http://oosh.it">Oosh</a> in Folkestone
                </div>
            </div>
        </footer> -->

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
