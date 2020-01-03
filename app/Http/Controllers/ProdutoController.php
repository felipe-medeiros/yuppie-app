<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Turma;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();

        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //traz o produto se já existe ou cria um novo
        $produto = Produto::firstOrNew( ['id' => $request->id] );
            
        //verifica se existe a model de produto(diferencia model de instância)
        if($produto->exists){
            
            $produto->update( $request->all() );
        }else{
            
            $produto->fill(['nome'    => $request->nome,
                            'estoque' => (int) $request->estoque,
                            'preco'   => (float) $request->preco]);

            // var_dump($produto);
           $produto->save();
        }

       return redirect('/produtos')->with('success', 'Produto adicionado');
    }

    public function storeFromCSV()
    {
        $produtos_turmas = session()->get('produtos_turmas');

        //separando o cabeçalho
        $cabecalho = $produtos_turmas[0];
        array_shift($produtos_turmas);
        
        // extraindo as turmas
        $turmas = array_slice($cabecalho, 3);

        //armazenando as turmas
        foreach($turmas as $turma){
            Turma::firstOrCreate(['nome' => $turma]);
        }

        //iterando o array já cadastrando o produto e turmas_materias se houver relacionamento com turmas
        foreach($produtos_turmas as $produto_array){

            $produto = Produto::firstOrNew([
                'nome' => $produto_array[ 0 ]
            ]);

            $produto->preco   =  (float) str_replace(',','.',$produto_array[ 1 ]);
            $produto->estoque += (int) $produto_array[ 2 ];
            $produto->save();

            if ( strlen($produto_array[3]) > 0 ) {
                $turma = Turma::where('nome', $cabecalho[3])->first();
                $produto->turmas()->syncWithoutDetaching( $turma->id );
            }

            if ( strlen($produto_array[4]) > 0 ) {
                $turma = Turma::where('nome', $cabecalho[4])->first();
                    $produto->turmas()->syncWithoutDetaching( $turma->id );
            }

            if ( strlen($produto_array[5]) > 0 ) {
                $turma = Turma::where('nome', $cabecalho[5])->first();
                $produto->turmas()->syncWithoutDetaching( $turma->id );
            }

            if ( strlen($produto_array[6]) > 0 ) {
                $turma = Turma::where('nome', $cabecalho[6])->first();
                $produto->turmas()->syncWithoutDetaching( $turma->id );
            }

        }

        return redirect('/produtos')->with('success', 'Produtos adicionados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);

        return view('produtos.create', compact('produto'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::destroy($id);

        return redirect('/produtos')->with('success', 'Produto removido');
    }
}
