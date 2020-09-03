<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Fontawesome fonts link start-->
    <link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel="stylesheet">
    <!--Fontawesome fonts link end-->

    <!-- Ajax Start -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Ajax End -->
   
    <!-- Custom Script Start  -->

    <script type="text/javascript">

        // common 

        window.xy=0; //  a global variable

        // common


        function rotateClockwise(){

            window.xy+=45;

            document.getElementById('x').style.transform="rotateZ("+window.xy+"deg)";
            var inner = document.getElementById('inner');
            if(inner.value==0 || inner.value==8){
                inner.value=1;
            }
            else{
                inner.value++;
            }

            // next alphabetical character function start
            let nextChar = (s => (
                "abcdefghijklmopqrstuvwxyza".split('')
                .reduce((a,b)=> (s[a]=b, b)), // make the lookup
            c=> s[c] // the function returned
            ))({}); // parameter s, starts empty
            // next alphabetical character function end

            var outer = document.getElementById('outer');
            if(outer.value=='' || outer.value=='h'){
                outer.value='a';
            }
            else{
                outer.value=nextChar(outer.value);
                // console.log(outer.value);
            }

            
        }

        function rotateAnticlockwise(){

            window.xy-=45;
                
            document.getElementById('x').style.transform="rotateZ("+window.xy+"deg)";
            var inner = document.getElementById('inner');
            if(inner.value==0 || inner.value==1){
                inner.value=8;
            }
            else{
                inner.value--;
            }

            // last alphabetical character function start
                
            // last alphabetical character function end

            var outer = document.getElementById('outer');
            if(outer.value=='' || outer.value=='a'){
                outer.value='h';
            }
            else{

                var i=outer.value.charCodeAt(0);

                outer.value= String.fromCharCode(i-1);       
            }

            
        }

        function innerValue(){
            
            $('#password').val($('#password').val() + $('#inner').val());

            // var inner = document.getElementById('inner').value;

            // var pass = document.getElementById('pass');

            // pass.value=inner;

        }


        function outerValue(){

            $('#password').val($('#password').val() + $('#outer').val());

            // var outer = document.getElementById('outer').value;

            // var pass = document.getElementById('pass');

            // pass.value=outer;

        }

        function backspace(){
            $('#password').val(
            function(index, value){
                return value.substr(0, value.length - 1);
            });
        }

    </script>
        
    <!-- Custom Script End -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>

        <script type="text/javascript">
                // will only be used if the email is verified and you can see the color wheel
                window.xy={!! session('color') !!}; //  a global variable
                document.getElementById('x').style.transform="rotateZ("+window.xy+"deg)";
        </script>

</body>
</html>
