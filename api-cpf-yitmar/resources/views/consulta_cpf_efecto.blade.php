<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>consulta</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                text-transform: uppercase;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                text-transform: uppercase;

            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                text-transform: uppercase;

            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            
        </style>

        <script>
            function mascara(i)
            {
   
                var v = i.value;
                
                if(isNaN(v[v.length-1]))
                { // impede entrar outro caractere que não seja número
                    i.value = v.substring(0, v.length-1);
                    return;
                }
                
                i.setAttribute("maxlength", "14");
                if (v.length == 3 || v.length == 7) i.value += ".";
                if (v.length == 11) i.value += "-";

            }
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    consulta cpf
                </div>

                <div class="links">
                    <form action="/buscar_fisica_2" method="GET">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input oninput="mascara(this)"  type="text" name="cpf" />
                        <button type="submit">procurar</button> 
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="color:#FF0000";>
                                    @foreach ($errors->all() as $error)
                                        <li style="color:#FF0000";>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif        <!-- procurar -->
                    </form> 
                    <br>
                    <button>
                        <a href="{{ url ('/') }}">
                            volver
                        </a>
                    </button>
                </div>                                     
            </div>
        </div>
    </body>
</html>