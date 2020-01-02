@extends('layouts.app')   

@section('content')

<link href="../css/style.css" rel="stylesheet">

<br><h4>Novo Produto</h4><br>
  
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
            <input type="number" name="{{ $produto->id }}"></label><br /><br />
        @endforeach

        <button type="submit" class="btn btn-primary">Comprar</button>
      </form>

@endsection