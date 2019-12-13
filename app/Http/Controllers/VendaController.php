<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Venda;
use App\Aluno;
use Carbon\Carbon;

class VendaController extends Controller
{

    public function index(){
        $vendas = Venda::all();

        return view('vendas.index')->with('vendas', $vendas);
    }
    
    public function create(){

        $alunos = Aluno::pluck('nome','id');
        $produtos = Produto::where('estoque','>',0)->get();

        return view('vendas.create')->with('dados', [
            'alunos'   => $alunos,
            'produtos' => $produtos
        ]);
    }
    
    public function efetuaVenda(Request $request){

        $comprados = $request->all();

        $aluno_id = $comprados['aluno_id'];
        array_shift($comprados);
        array_shift($comprados);
        
        $aluno = Aluno::find($aluno_id);
        
        $venda = Venda::firstOrNew([
            'data' => Carbon::now(),
            'finalizada' => true
        ]);
        $venda->aluno()->associate( $aluno );
        $venda->save();

        foreach ($comprados as $comprado) {

            $comprado = Produto::where('id',$comprado)->first();
            
            $comprado->vendas()->attach( $venda, [
                'preco' => $comprado->preco,
                'quantidade' => 1
            ]);
        }

        return redirect ('/vendas')->with('succes', 'Venda concluída');
    }
}
