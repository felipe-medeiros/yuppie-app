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

        //extraindo id de aluno e token do array, deixando apenas os produtos comprados
        $aluno_id = $comprados['aluno_id'];
        unset($comprados['aluno_id']);
        unset($comprados['_token']);
        
        
        $aluno = Aluno::find($aluno_id);
        
        $venda = Venda::firstOrNew([
            'data' => Carbon::now(),
            'finalizada' => true
        ]);

        $venda->aluno()->associate( $aluno );
        $venda->save();
            
        foreach ($comprados as $key => $comprado) {
            
            if(gettype($key) === 'string'){

                $comprado = Produto::where('id',$comprado)->first();

                //atualizando o estoque
                $quantidade = $comprados[(int)$comprado->id]; 
                $comprado->estoque -= $quantidade;

                
                $comprado->save();
                
                $comprado->turmas()->syncWithoutDetaching( $aluno->turma->id );
                
                $comprado->vendas()->attach( $venda, [
                    'preco'      => $comprado->preco,
                    'quantidade' => $quantidade
                ]);
            }        
                
        }

        return redirect ('/vendas')->with('succes', 'Venda concluída');
    }
}
