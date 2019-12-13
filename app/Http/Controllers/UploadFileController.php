<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Database\Seed\ProdutosTableSeeder;

class UploadFileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //acessando o conteúdo do arquivo enviado
        $conteudo = $request->arquivo->get();
        
        //separando linhas em arrays
        $linhas = explode("\n", $conteudo);
        array_pop($linhas);
        array_shift($linhas);
        
        //montando a matriz
        $produtos_turmas = array_fill(0,15,'');
        
        //preenchendo a matriz
        $count = 0;        
        foreach( $linhas as $linha_s ){
            
            //transforma as linhas em array
            $linha = explode(';', $linha_s );
            array_pop( $linha );
            
            $temp = 0;
            $produtos_turmas[$count] = array_fill($temp,7,'');
            
            foreach( $linha as $ele ){
            
                $produtos_turmas[$count][$temp] = $ele;
                $temp++;

            }
            $count++;
        }

        return redirect('produtos/mass_store')->with('produtos_turmas', $produtos_turmas);
    }
}
