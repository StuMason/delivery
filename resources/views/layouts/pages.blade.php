<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Oosh</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Compiled and minified CSS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="/" class="brand-logo">Oosh</a>  
                <ul class="right">
                    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </ul>              
            </div>
        </nav>

        <ul class="sidenav" id="nav-mobile">
            <!-- <li><a href="#">Navbar Link</a></li> -->
            @auth
                <li><a href="{{ url('/home') }}">Home</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            @endauth
        </ul>

        @yield('content')

        <footer class="page-footer orange">
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
        </footer>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
