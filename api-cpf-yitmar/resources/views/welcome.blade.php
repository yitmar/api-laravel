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
                text-transform: uppercase;

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
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
            <div class="col-md-6">
                <div class="title m-b-md">
                    cadastrar
                </div>
                <div class="links">
                    <a href="{{ url('registro_pessoa') }}">Pessoa Fisica</a>
                    <a href="{{ url('registro_juridica') }}">Pessoa Juridica</a>
                </div>
            </div>
            <div class="col-md-6">   
                <div class="title m-b-md">
                    consulta
                </div>

                <div class="links">
                    <a href="{{ url('consulta_fisica') }}">Pessoa Fisica</a>
                    <a href="{{ url('consulta_juridica') }}">Pessoa Juridica</a>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>
