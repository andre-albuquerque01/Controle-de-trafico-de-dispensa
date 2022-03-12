<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <!-- Load Roboto font -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    include_once './layout/layout.php';
    ?>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./layout/style.css">

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
        <div class="flex-box">
            <h3 class="text-primary text-center" style="margin-top: 0.5em;">Cadastrar Cliente</h3>
            <form action="processa_cliente.php" method="POST">
                <div class="row">
                    <div class="offset-5 col-2">
                        <h6>Dados pessoais</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-5 col-1">
                        <label>Nome</label><br>
                        <input type="text" name="nome" id="name" class="name" require><br>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-5 col-2">
                        <label>Telefone celular</label><br>
                        <input type="number" name="telefone" step="" id="telefone" class="telefone" require><br>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-5 col-2">
                        <label>Telefone de contato</label><br>
                        <input type="number" name="telefone_cont" id="telefone" class="telefone">
                    </div>
                </div>


                <div class="row">
                    <div class="offset-5 col-2" style="margin-top: 0.5em;">
                        <h6>Cadastro endereço</h6>
                    </div>
                </div>
                <!-- Inicio do formulario -->
                <div class="row">
                    <div class="offset-5 col-2">
                        <label>Cep</label><br />
                        <input name="cep" type="text" id="cep" value="" size="20" maxlength="9" onblur="pesquisacep(this.value);" require><br />
                    </div>
                </div>
                <div class="row">
                    <div class="offset-5 col-2">
                        <label>Rua</label><br>
                        <input name="rua" type="text" id="rua" size="20" require /><br>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-5 col-2">
                        <label>Bairro</label><br />
                        <input name="bairro" type="text" id="bairro" size="20" require /><br>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-5 col-2">
                        <label>Cidade</label><br />
                        <input name="cidade" type="text" id="cidade" size="20" require /><br>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-5 col-2">
                        <label>UF</label><br />
                        <select name="uf" id="uf" style="width: 115%;">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select><br />
                    </div>
                </div>
                <div class="row">
                    <div class="offset-5 col-2" >
                        <label>Complemento</label><br />
                        <input name="complemento" type="text" size="20"><br>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="offset-5 col-2" style="margin-top: 1em;">
                <input name="botton" class="btn btn-outline-dark" type="submit" value="Enviar" style="width: 115%;"/>
            </div>
        </div>
        </form>
    </div>
</body>

</html>