<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

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
        //traz o produto se já existe(update) ou cria um novo(create)
        $produto = Produto::firstOrNew( ['id' => $request->id] );
            
        //verifica se existe a model de produto(diferencia model de instância)
        if($produto->exists){
            $produto->update( $request->all() );
        }else{
            $produto->fill( $request->all() );
            $produto->save();
        }

        return redirect('/produtos')->with('success', 'Produto adicionado');
    }

    public function storeFromCSV()
    {
        $produtos_turmas = session()->get('produtos_turmas');
        foreach($produtos_turmas as $produto){
            Produto::create([
                'nome'    => $produto[ 0 ],
                'preco'   => (float) str_replace(',','.',$produto[ 1 ]),
                'estoque' => (int) $produto[ 2 ]
            ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
