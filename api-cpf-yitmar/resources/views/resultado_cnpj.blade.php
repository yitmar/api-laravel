<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>api consulta</title>

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
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
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
                text-transform: uppercase;

            }
            th {
                margin:50px;
                text-transform: uppercase;

            }
            tr {
                margin:50px;
                text-transform: uppercase;

            }
            th, td {
                padding: 10px;
                }
            table, th, td {
                border: 1px solid black;
                margin: 10px;
            }
            table{
                margin-bottom: 50px;
                
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
                    dados
                </div>
                <div>
                    @if (isset($result))
                    <table class="table table-striped table-bordered scrolling-dataTable">
                        <thead>
                            <tr>
                                <th>nome juridico</th>
                                <th>cnpj</th>
                                <th>pessoa fisica</th>
                                <th>cpf</th>
                            </tr>
                        </thead>
                        <tbody>

                        
                        @if (count($result) === 0)
                            
                        
                                <td> sem resultado </td>
                        
                        @else

                            @foreach ($result as $resulta)
                              
                                    <td>{{ $resulta->nome }}</td>
                                    <td>{{ $resulta->cnpj }}</td>
                                    <td>{{ $resulta->nome_fisico }}</td>
                                    <td>{{ $resulta->cpf }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    @else
                    <table class="table table-striped table-bordered scrolling-dataTable">
                        <thead>
                            <tr>
                                <th>cnpj</th>
                            </tr>
                        </thead>
                        <tbody>      
                            <tr>
                                <td>{{ $error }}</td>
                            </tr>                    
                        </tbody>
                    </table>
                    @endif
                
                </div>
                <button>
                    <a href="{{ url ('/') }}">
                        volver
                    </a>
                </button>
            </div>
        </div>
    </body>
</html>
