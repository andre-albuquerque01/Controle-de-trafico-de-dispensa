<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type; X-UA-Compatible" content="text/html; charset=utf-8; IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro endereço</title>
    <!-- Adicionando Javascript -->
    <script>
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");

        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);

            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";


                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

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
        };
    </script>
</head>

<body>
    <div class="container">
        <h1>Cadastro endereço</h1>
        <!-- Inicio do formulario -->
        <form method="POST" action="processa_endereco.php">
            <label>Cep:</label><br />
            <input name="cep" type="text" id="cep" value="" size="20" maxlength="9" onblur="pesquisacep(this.value);" require><br />
            <label>Rua:</label><br>
            <input name="rua" type="text" id="rua" size="20" require/><br>
            <label>Bairro:</label><br />
            <input name="bairro" type="text" id="bairro" size="20" require/><br>
            <label>Cidade:</label><br />
            <input name="cidade" type="text" id="cidade" size="20" require/><br>
            <label>UF:</label><br />
            <input name="uf" type="text" id="uf" size="20" /><br>
            <label>Complemento:</label><br />
            <input name="complemento" type="text" id="uf" size="2" ><br>

            <input name="botton" type="submit" value="Enviar" id="" size="8" />
        </form>
    </div>
</body>

</html>