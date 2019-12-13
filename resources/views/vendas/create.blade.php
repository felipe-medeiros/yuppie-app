<html>
    <head>
    <title>Cadastro Produto</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>
    
    </head>

    <body >
    <!-- Inicio do formulario -->
      <form method="post" action="{{ route('efetua') }}">
        @csrf
        <?php $count = 1; ?>
        <label for="aluno_id">Aluno</label>
        <select name="aluno_id" id="aluno_id">        
        @foreach($dados['alunos'] as $aluno)
            <option value="<?=$count?>">{{ $aluno }}</option>
            <?php $count++; ?>
        @endforeach
        </select></label><br><br>

        @foreach($dados['produtos'] as $produto)
            <label for="{{ $produto->nome }}">{{ $produto->nome }}</label>
            <input type="checkbox" value="{{ $produto->id }}" name="{{ $produto->nome }}"  >

            <label>Quantidade:
            <input type="number" id="{{ $produto->nome }}"></label><br /><br />
        @endforeach

        <button type="submit" class="btn btn-primary">Comprar</button>
      </form>
    </body>

    </html>