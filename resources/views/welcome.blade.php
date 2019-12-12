<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>YuppieApp</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
          

            <div class="content">
                <div class="title m-b-md">
                    YuppieApp
                </div>

                <div class="links">
                    <a href="{{ route('alunos.index') }}">Alunos</a>
                    <a href="{{ route('produtos.index') }}">Produtos</a>
                </div>
            </div>
        </div>
    </body>
</html>
