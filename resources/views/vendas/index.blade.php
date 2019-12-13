<html>
<body>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Data</td>
          <td>Aluno</td>
        </tr>
    </thead>
    <tbody>
        @foreach($vendas as $venda)
        <tr>
            <td>{{$venda->id}}</td>
            <td>{{$venda->data}}</td>
            <td>{{$venda->aluno->nome}}</td>           
        </tr>
        @endforeach
    </tbody>
  </table><br>
  <a href="/">Home</a>
  
</body>
</html>