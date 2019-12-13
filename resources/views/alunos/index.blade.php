<html>
<body>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nome</td>
          <td>Nascimento</td>
          <td>Cep</td>
          <td>Endereço</td>
          <td>Bairro</td>
          <td>Cidade</td>
          <td>UF</td>
          <td>Turma</td>
          <td colspan="2"></td>
        </tr>
    </thead>
    <tbody>
        @foreach($alunos as $aluno)
        <tr>
            <td>{{$aluno->id}}</td>
            <td>{{$aluno->nome}}</td>
            <td>{{$aluno->data_nascimento}}</td>
            <td>{{$aluno->cep}}</td>
            <td>{{$aluno->endereco}}</td>
            <td>{{$aluno->bairro}}</td>
            <td>{{$aluno->cidade}}</td>
            <td>{{$aluno->uf}}</td>
            <td>{{$aluno->turma->nome}}</td>
            <td><button href="{{ route('alunos.edit',$aluno->id)}}" class="btn btn-primary">Editar</button></td>
            <td>
                <form action="{{ route('alunos.destroy', $aluno->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Remover</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  <form action="{{ route('alunos.create')}}" method="get">
    <button type=submit class="btn btn-primary">Novo Aluno</button>
  </form>
  <a href="/">Home</a>
</body>
</html>