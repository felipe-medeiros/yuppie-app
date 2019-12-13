<html>
    <head>
    <title>Cadastro Produto</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    $(document).ready(function() {
      @isset($produto)
          $('#id').val("{{ $produto->id }}");
          $('#nome').val("{{ $produto->nome }}");
          $('#estoque').val("{{ $produto->estoque }}");
          $('#preco').val("{{ $produto->preco }}");
      @endisset
    });

    </script>
    
    </head>

    <body >
    <!-- Inicio do formulario -->
    <form enctype="multipart/form-data" action="{{ route('upload') }}" method="post">
      @csrf
      <input type="file" name="arquivo" id="arquivo"><br><br>
      <button type="submit">Enviar</button>
    </form><br><br>
      <form method="post" action="{{ route('produtos.store') }}">
        @csrf
        <input type="hidden" name="id" id="id" value="">
        <label>Nome:
        <input name="nome" type="text" id="nome" size="60"></label><br /><br />
        <label>Estoque:
        <input type="number" name="estoque" id="estoque"></label><br /><br />
        <label>Preço:
        <input name="preco" type="number" id="cep" value="" min="0.00" max="99999.99" step="0.01" /></label><br /><br />
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
    </body>

    </html>