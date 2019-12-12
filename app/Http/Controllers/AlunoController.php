<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Turma;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::all();

        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Trazendo todas as turmas para o formulário de cadastro de aluno
        $turmas = Turma::pluck('nome','id');

        return view('alunos.create', compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //transformando cep em inteiro
        $cepInt = (int)$request->cep;

        //instanciando a turma selecionada
        $turma = Turma::find( $request->turma_id );

        //Traz o aluno se já existe(update) ou cria um novo(create)
        $aluno = Aluno::firstOrNew( ['id' => $request->id] );
           
        //associando à turma
        $aluno->turma()->associate( $turma );

        if($aluno->exists){
            $aluno->update( $request->all() );
        }else{
            $aluno->fill( $request->all() );
            $aluno->save();
        }

        return redirect('/alunos')->with('success', 'Aluno adicionado');
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
        $aluno = Aluno::find($id);
        $turmas = Turma::pluck('nome','id');

        return view('alunos.create', compact('turmas'), compact('aluno'));
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
        Aluno::destroy($id);

        return redirect('/alunos')->with('success', 'Aluno removido');
    }
}
