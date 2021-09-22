<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EasEat</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/BVJktcf/logo-Vero-removebg-preview.png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    

    <!-- Style -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>
    
    <!-- Classe che contiene il codice del primo pannello -->
    <div class="main" id="header">
        <!-- Classe che contiene il menù sopra  -->
        @if (Route::has('login'))
        <div class="topnav">
            @auth
            <a class="button" href="{{ route('home') }}" style="color: #000; width: 300px; text-align:end;"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg> <strong>Home di {{ Auth::user()->username }}</strong></span></a>
            @else
            <a class="button" href="{{ route('login') }}" style="color: #000;"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
              </svg> <strong>Login</strong></span></a>

            @if (Route::has('pre-register'))
            <a class="button" href="{{ route('pre-register') }}" style="color: #000;"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg>  <strong>Registrati</strong></span></a>
            @endif
            @endauth
        </div>
        @endif

        <!-- Classe che stabilisce la posizione e il contenuto del titolo EasEat -->
        <div class="content">
            <div class="title"><img class="logo" src="https://i.ibb.co/BVJktcf/logo-Vero-removebg-preview.png">
                EasEat</div>
        </div>

        <p class="benvenuto">Troveremo per te un posto al sicuro</p>

        <!-- Classe che stabilisce la posizione della barra di ricerca -->
        <div id="app">
            <form action="{{ route('ricerca_locali') }}" method="post">
                @csrf

                   <search-bar></search-bar>
             
                
            </form> 
        </div> 
    
        <!-- Classi che permettono di spostarsi alla zona inferiore della pagina -->
        <div class="container-scroller">
            <a class="scroll" href="#page2">Scopri i più popolari!</a>
        </div>
        <a href="#page2">
            <img class="down-arrow" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Arrow-down.svg/1280px-Arrow-down.svg.png" alt="continua in basso" style="bottom: 60px; opacity: 1;">
        </a>
    </div>

    <!-- Classe che contiene il codice del secondo pannello -->

    <div class="container-fluid main" id="page2">
        <div class="imgContainer">
            <div class="hovereffect">
                <img class="imgTry" src="https://cdn.pixabay.com/photo/2015/10/12/15/11/cafe-984275_960_720.jpg" alt="">
                <div class="overlay">
                    <h2>Scopri</h2>
                    <p>
                        <a href="bar">BAR</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="imgContainer">
            <div class="hovereffect">
                <img class="imgTry" src="https://cdn.pixabay.com/photo/2015/04/20/13/30/kitchen-731351_960_720.jpg" alt="">
                <div class="overlay">
                    <h2>Scopri</h2>
                    <p>
                        <a href="ristorante">RISTORANTI</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="rowThird">
            <div class="hovereffect">
                <img class="imgTry" src="https://cdn.pixabay.com/photo/2017/05/26/12/39/ireland-2345992_1280.jpg" alt="">
                <div class="overlay">
                    <h2>Scopri</h2>
                    <p>
                        <a href="pub">PUB</a>
                    </p>
                </div>
            </div>
        </div>
    
        <!-- Classe per tornare in cima alla pagina -->
        <button class="btn btn-waves align-right" onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        
    </div>
    
    <!-- Codice JavaScript per lo spostamento tra sezioni -->
    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }


    </script>
    <script type="text/javascript" src="/js/app.js"></script>
   
</body>

</html>