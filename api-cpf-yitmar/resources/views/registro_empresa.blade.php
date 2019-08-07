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
                text-transform: uppercase;

            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
                text-transform: uppercase;

            }

            .content {
                text-align: center;
                text-transform: uppercase;

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
                    CADASTRAR PESSOA juridica
                </div>

                <div class="links">
                    <form action="/save_empresa" method="POST">     
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label for=""> nome </label>
                        <input type="text" name="nome" />
                        <label for=""> cnpj </label>
                        <input type="text" name="cnpj" />
                        <label for=""> cpf </label>
                        <select name="cpf">  
                            <option value=null>---------------</option>
                            @foreach  ($result as $resulta)
                                <option value= "{{ $resulta->id }}"> {{ $resulta->cpf }}</option>
                            @endforeach 
                        </select>
                        <button type="submit">salvar</button> 
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul >
                                    @foreach ($errors->all() as $error)
                                        <li style="color:red";>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif  
                       
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