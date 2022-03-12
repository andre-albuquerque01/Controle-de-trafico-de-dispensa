<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="theme-color" content="#2e8cc2">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="author" content="Marx JMoura">
  <meta name="copyright" content="Marx J. Moura">
  <meta name="description" content="Create more organized forms and making it even easier to navigate using tabs.">
  <title>Cadastro cliente</title>
  <link rel="icon" href="../../images/ico/icone.png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../../dist/admin4b.min.css?v=2.1.0" rel="stylesheet">
  <link href="../../dist/admin4b.min.css" rel="stylesheet" type="text/css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    function calcular() {
      var valor1 = parseFloat(document.getElementById('mao_obra').value);
      var valor2 = parseFloat(document.getElementById('custo_peca').value);
      document.getElementById('valor_total').value = parseFloat(valor1) + parseFloat(valor2);
    }
  </script>
</head>

<body>
  <div class="app">
    <div class="app-sidebar">
      <div class="sidebar-header">
        <img src="../../images/principal3.png" width="70px" alt="Imagem de entrada"><br>
        <div class="username"><span>Bem vindo <?php session_start();
                                              echo $_SESSION['nome_completo_login']; ?>!</span> <small><?php echo $_SESSION['email_usuario']; ?></small></div>
      </div>
      <div id="sidebar-nav" class="sidebar-nav">
        <ul>
          <li><a href="../index.php"><span class="sidebar-nav-icon fa fa-rocket"></span> <span class="sidebar-nav-text">Inicio</span></a></li>
        </ul>
        <hr><span class="sidebar-nav-header">Opções</span>
        <ul>
          <li><a href="#forms" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-pencil-square-o"></span> <span class="sidebar-nav-text">Cadastrar</span></a>
            <ul id="forms" class="collapse" data-parent="#sidebar-nav">
              <li><a href="cadastro_cliente.php">Cliente</a></li>
              <li><a href="cadastro_tecnico.php">Tecnico</a></li>
            </ul>
          </li>
          <li><a href="#search" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-search"></span> <span class="sidebar-nav-text">Pesquisar</span></a>
            <ul id="search" class="collapse" data-parent="#sidebar-nav">
              <li><a href="../../view/pesquisar/pesquisa_aparelho.php">Aparelho</a></li>
              <li><a href="../../view/pesquisar/pesquisa_cliente.php">Cliente</a></li>
              <li><a href="../../view/pesquisar/pesquisa_reparo.php">Reparo</a></li>
              <li><a href="../../view/pesquisar/pesquisa_tecnico.php">Tecnico</a></li>
              <li><a href="../../view/pesquisar/pesquisa_cliente_aparelho.php">Cliente e Aparelho</a></li>
            </ul>
          </li>
        </ul>
        <hr><span class="sidebar-nav-header">Configuração</span>
        <ul>
          <li><a href="../editar/configuracao_geral.php  "><span class="sidebar-nav-icon fa fa-cog"></span> <span class="sidebar-nav-text">Configuração</span></a>
          </li>
        </ul>
        <hr>
        <ul>
          <li><a href="../../controll/crud/sair.php"><span class="sidebar-nav-icon fa fa-power-off"></span>
              <span class="sidebar-nav-text">Log out</span></a></li>
        </ul>
        <hr>
        &nbsp;&nbsp;&nbsp;
        <small>Versão 1</small>
      </div>
    </div>
    <div class="app-content">
      <div class="content-header">

        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item">Cadastro cliente</li>
          </ol>
        </nav>
      </div>
      <div class="content-body">
        <div class="container">
          <a href="https://getbootstrap.com/docs/4.1/components/navs/#tabs"></a>
          <a href="https://getbootstrap.com/docs/4.1/components/navs/#tabs"></a>
          <a href="https://getbootstrap.com/docs/4.1/components/collapse/"></a>

          <div class="nav-tabs-responsive">
            <div class="card">
              <?php
              include_once "../../controll/crud/verifica_login.php";
              include_once '../../controll/crud/conexao.php';
              $id_session = $_SESSION['id_login'];
              ?>
              <form action="../../controll/crud/cadastro/processa_cliente.php?id=<?= $id_session ?>" method="POST">
                <ul class="nav nav-tabs">
                  <!--<li class="nav-item"><a href="#account" class="nav-link active" data-toggle="tab"><i class="fa fa-lock mr-2"></i> Conta</a></li>-->
                  <li class="nav-item"><a href="#personal" class="nav-link" data-toggle="tab"><i class="fa fa-user-circle-o mr-2"></i> Pessoal</a></li>
                </ul>
                <div id="tabContent" class="tab-content">
                  <!--<div id="account" class="tab-pane show active"><a href="#account-collapse" class="nav-link-collapse" data-toggle="collapse"><i class="fa fa-lock mr-2"></i> Conta</a>
                    <div id="account-collapse" class="collapse show" data-parent="#tabContent">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group"><label>Nome completo do usuario</label> <input type="text" name="nome_completo" class="form-control" required></div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group"><label>E-mail</label> <input type="text" name="email_usuario" class="form-control" required></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group"><label>Senha</label> <input type="password" name="senha_usuario" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group"><label>Confirma senha</label> <input name="senha_usuario_verificaçao" type="password" class="form-control" required></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>-->
                  <div id="personal" class="tab-pane show active"><a href="#personal-collapse" class="nav-link-collapse" data-toggle="collapse"><i class="fa fa-user-circle-o mr-2"></i> Pessoal</a>
                    <div id="personal-collapse" class="collapse show" data-parent="#tabContent">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-lg-6">
                            <div class="form-group"><label>Primeiro nome</label> <input type="text" class="form-control" name="nome_completo" required>
                            </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                              <label>Telefone</label><input type="number" class="form-control" name="telefone_celular" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group"><label>E-mail</label> <input type="text" name="email_cliente" class="form-control" required> </div>
                            <div class="form-group"><label>CEP</label> <input type="number" class="form-control" name="cep" id="cep" onblur="pesquisacep(this.value);" required> </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group"><label>Telefone comercial</label> <input type="number" class="form-control" name="telefone_contato"></div>
                            <div class="form-group"><label>Cidade</label> <input type="text" class="form-control" name="cidade" id="cidade" required> </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-lg-6">
                            <div class="form-group"><label>Endereço</label> <input type="text" class="form-control" name="rua" id="rua">
                            </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group"><label>Estado</label>
                              <select class="form-control" name="uf" id="uf" required>
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
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-lg-6">
                            <div class="form-group"><label>Bairro</label> <input type="text" class="form-control" name="bairro" id="bairro" required></div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group"><label>Complemento</label> <input type="text" class="form-control" name="complemento"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
          </div>
          <div class="form-group"><button type="submit" class="btn btn-primary mr-1">Salvar</button>
            <!-- <button type="reset" class="btn btn-secondary">Cancelar</button> -->
          </div>

        </div>
      </div>
      </form>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
  <script src="../../dist/admin4b.min.js" type="text/javascript"></script>
</body>

</html>