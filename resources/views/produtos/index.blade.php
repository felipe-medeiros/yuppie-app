<html>
<body>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nome</td>
          <td>Estoque</td>
          <td>Preço</td>
          <td colspan="2"></td>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $produto)
        <tr>
            <td>{{$produto->id}}</td>
            <td>{{$produto->nome}}</td>
            <td>{{$produto->estoque}}</td>
            <td>{{$produto->preco}}</td>
            <td></td>
            <td><a href="{{ route('produtos.edit', $produto->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('produtos.destroy', $produto->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Remover</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  <form action="{{ route('produtos.create')}}" method="get">
    <button type=submit class="btn btn-primary">Novo produto</button>
  </form>
  <a href="/">Home</a>
  
</body>
</html>