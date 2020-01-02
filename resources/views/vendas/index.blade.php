@extends('layouts.app')   

@section('content')

<br><h4>Vendas Efetuadas</h4>
  <form action="{{ route('nova')}}" method="get">
    <button type=submit class="btn btn-primary">Nova venda</button>
  </form><br>
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
  
@endsection