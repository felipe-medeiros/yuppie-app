<html>
    <head>
    <title>Cadastro Aluno</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {
            @isset($aluno)
                $('#id').val("{{ $aluno->id }}");
                $('#nome').val("{{ $aluno->nome }}");
                $('#cep').val("{{ $aluno->cep }}");
                $('#bairro').val("{{ $aluno->bairro }}");
                $('#endereco').val("{{ $aluno->endereco }}");
                $('#cidade').val("{{ $aluno->cidade }}");
                $('#uf').val("{{ $aluno->uf }}");
                $('#turma_id').val("{{ $aluno->turma_id }}");
                $('#data_nascimento').val("{{ $aluno->data_nascimento }}");
            @endisset

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
    </head>

    <body >
    <!-- Inicio do formulario -->
      <form method="post" action="{{ route('alunos.store') }}">
        @csrf
        <?php $count = 1; ?>
        <label>Turma:
        <select name="turma_id" id="turma_id">
        @foreach($turmas as $turma)
            <option value="<?=$count?>">{{ $turma }}</option>
            <?php $count++; ?>
        @endforeach
        </select></label><br><br>
        <input type="hidden" name="id" id="id" value="">
        <label>Nome:
        <input name="nome" type="text" id="nome" size="60"></label><br /><br />
        <label>Data de Nascimento
        <input type="date" name="data_nascimento" id="data_nascimento"></label><br /><br />
        <label>Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" /></label><br /><br />
        <label>Endereço:
        <input name="endereco" type="text" id="endereco" size="60" /></label><br /><br />
        <label>Bairro:
        <input name="bairro" type="text" id="bairro" size="40" /></label><br /><br />
        <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" /></label><br /><br />
        <label>Estado:
        <input name="uf" type="text" id="uf" size="2" /></label><br /><br />
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
      <a href="/">Home</a>
    </body>

    </html>