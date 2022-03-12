<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="theme-color" content="#2e8cc2">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="author" content="Marx JMoura">
  <meta name="copyright" content="Marx J. Moura">
  <meta name="description" content="Admin 4B is an open source and free admin template built on top of Bootstrap 4. Quickly customize with our Sass variables and mixins.">
  <title>Dashboard</title>
  <link rel="icon" href="favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../dist/admin4b.min.css?v=2.1.0" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">
  <link href="../dist/admin4b.min.css" rel="stylesheet" type="text/css" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="app">
    <div class="app-sidebar">
      <div class="sidebar-header">
        <svg class="avatar">
          <use href="assets/img/faces.svg" />
        </svg>
        <div class="username"><span>Bem vindo <?php session_start();
                                              echo $_SESSION['nome_completo_login']; ?>!</span>
          <small><?php echo $_SESSION['email_usuario']; ?> </small>
        </div>
      </div>
      <div id="sidebar-nav" class="sidebar-nav">
        <span class="sidebar-nav-header">Opções</span>
        <ul>
          <li><a href="#forms" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-pencil-square-o"></span> <span class="sidebar-nav-text">Cadastrar</span></a>
            <ul id="forms" class="collapse" data-parent="#sidebar-nav">
              <li><a href="./pages/forms/cadastro_cliente.php">Cliente</a></li>
              <li><a href="./pages/forms/cadastro_tecnico.php">Tecnico</a></li>
            </ul>
          </li>
          <li><a href="#search" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-search"></span> <span class="sidebar-nav-text">Pesquisar</span></a>
            <ul id="search" class="collapse" data-parent="#sidebar-nav">
              <li><a href="./pages/pesquisar/pesquisa_cliente.php">Cliente</a></li>
              <li><a href="./pages/pesquisar/pesquisa_aparelho.php">Aparelho</a></li>
              <li><a href="./pages/pesquisar/pesquisa_reparo.php">Reparo</a></li>
              <li><a href="./pages/pesquisar/pesquisa_tecnico.php">Tecnico</a></li>
              <li><a href="./pages/pesquisar/pesquisa_cliente_aparelho.php">Cliente e Aparelho</a></li>
            </ul>
          </li>
          <!-- <li><a href="#layout" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-clone"></span> <span class="sidebar-nav-text">Layout</span></a>
            <ul id="layout" class="collapse" data-parent="#sidebar-nav">
              <li><a href="pages/layout/sidebar.html">Sidebar</a></li>
              <li><a href="pages/layout/spinner.html">Spinner</a></li>
              <li><a href="pages/layout/table.html">Table</a></li>
            </ul>
          </li>-->
        </ul>
        <hr><span class="sidebar-nav-header">Configuração</span>
        <ul>
          <li><a href="./pages/editar/configuracao_geral.php  "><span class="sidebar-nav-icon fa fa-cog"></span> <span class="sidebar-nav-text">Configuração</span></a>
          </li>

        </ul>
        <hr>
        <ul>
          <li><a href="./crud/sair.php"><span class="sidebar-nav-icon fa fa-power-off"></span> <span class="sidebar-nav-text">Log out</span></a></li>
        </ul>
        <hr>
        &nbsp;&nbsp;&nbsp;
        <small>Versão 1</small>
      </div>
    </div>
    <div class="app-content">
      <div class="content-header">
        <nav class="navbar navbar-expand navbar-light bg-white">
          <div class="navbar-brand">
            <?php
            date_default_timezone_set("America/Sao_Paulo");
            $date = date("H:i:s");
            $hora_do_dia = date("H");
            if (($hora_do_dia >= 00) && ($hora_do_dia <= 12)) {
              echo "Bom dia, ";
            } else if (($hora_do_dia >= 12) && ($hora_do_dia <= 18)) {
              echo "Boa tarde, ";
            } else {
              echo "Boa noite, ";
            }
            echo $_SESSION['nome_completo_login'];
            ?>!
          </div>
        </nav>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Get started</li>
            <span id="conteudo"></span>
          </ol>
        </nav>
      </div>
      <script>
        var qnt_result_pg = 50; //quantidade de registro por página
        var pagina = 1; //página inicial
        $(document).ready(function() {
          pesquisa_cliente(pagina, qnt_result_pg); //Chamar a função para listar os registros
        });

        function pesquisa_cliente(pagina, qnt_result_pg) {
          var dados = {
            pagina: pagina,
            qnt_result_pg: qnt_result_pg
          }
          $.post('./pages/search/pesquisa_cliente.php', dados, function(retorna) {
            //Subtitui o valor no seletor id="conteudo"
            $("#conteudo").html(retorna);
          });
        }
      </script>
      <?php
      include_once "./crud/verifica_login.php";
      if (isset($_SESSION['msg']) != null) {
        echo "<script> Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: '" . $_SESSION['msg'] . "',
        showConfirmButton: false,
        timer: 1500
        }) </script>";
        $_SESSION['msg'] = null;
      } else if (isset($_SESSION['erro']) != null) {
        echo "<script> Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '" . $_SESSION['erro'] . "',
        }) </script>";
        $_SESSION['erro'] = null;
      }
      ?>
      <div class="content-body">
        <div class="container">
          <div class="align-items-center">
            <div class="" style="margin-top: 2em">
              <p>Clientes</p>
              <table class="table table-bordered table-hover text-center">
                <tr class="bg bg-primary text-white text-center">
                  <td>Nome</td>
                  <td>Telefone</td>
                  <td>CEP</td>
                  <td>Cidade</td>
                  <td>UF</td>
                  <td>Bairro</td>
                  <td>Rua</td>
                  <td>Complemento</td>
                </tr>

                <?php
                include_once './crud/conexao.php';
                //session_start();
                include_once './crud/verifica_login.php';
                //include_once './crud/verifica_login.php';
                $id_session = $_SESSION['id_login'];
                $pesquisa = $conexao->query("SELECT * FROM cliente INNER JOIN endereco ON endereco_id_endereco = id_endereco INNER JOIN login ON cliente.login_id_login = login.id_login WHERE login.id_login = $id_session LIMIT 5");
                while ($tabela = $pesquisa->fetch()) {
                  $nome = $tabela['nome_completo'];
                  $telefone = $tabela['telefone_celular'];
                  $cep = $tabela['cep'];
                  $cidade = $tabela['cidade'];
                  $uf = $tabela['uf'];
                  $bairro = $tabela['bairro'];
                  $rua = $tabela['rua'];
                  $complemento = $tabela['complemento'];
                  $id = $tabela['id_cliente'];

                ?>

                  <tr class="text-center">
                    <td>
                      <?= $nome ?>
                    </td>
                    <td>
                      <?= $telefone ?>
                    </td>
                    <td>
                      <?= $cep ?>
                    </td>
                    <td>
                      <?= $cidade ?>
                    </td>
                    <td>
                      <?= $uf ?>
                    </td>
                    <td>
                      <?= $bairro ?>
                    </td>
                    <td>
                      <?= $rua ?>
                    </td>
                    <td>
                      <?= $complemento ?>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </table>
              <a href="pages/pesquisar/pesquisa_cliente.php">Ver mais</a>
            </div>
          </div>

          <div class="align-items-center">
            <div class="" style="margin-top: 2em">
              <p>Clientes e os aparelhos</p>
              <table class="table table-bordered table-hover text-center">
                <tr class="bg bg-primary text-white text-center">
                  <td>Nome</td>
                  <td>Telefone</td>
                  <td>Modelo</td>
                  <td>Marca</td>
                  <td>Numero</td>
                  <td>Descricao</td>
                </tr>

                <?php
                $pesquisa = $conexao->query("SELECT * FROM cliente_eletronico INNER JOIN cliente ON cliente.id_cliente = cliente_eletronico.cliente_id_cliente 
                INNER JOIN eletronico ON eletronico.id_eletronico = cliente_eletronico.eletronico_id_eletronico INNER JOIN login ON cliente.login_id_login = login.id_login WHERE cliente.login_id_login = $id_session LIMIT 5");
                while ($resultado = $pesquisa->fetch()) {
                  $nome = $resultado['nome_completo'];
                  $telefone = $resultado['telefone_celular'];
                  $modelo = $resultado['modelo'];
                  $marca = $resultado['marca'];
                  $numero = $resultado['numero'];
                  $descricao = $resultado['descricao'];
                  $id = $resultado['cliente_id_cliente'];
                ?>

                  <tr class="text-center">
                    <td>
                      <?= $nome ?>
                    </td>
                    <td>
                      <?= $telefone ?>
                    </td>
                    <td>
                      <?= $modelo ?>
                    </td>
                    <td>
                      <?= $marca ?>
                    </td>
                    <td>
                      <?= $numero ?>
                    </td>
                    <td>
                      <?= $descricao ?>
                    </td>
                  </tr>

                <?php
                }
                ?>
              </table>
              <a href="pages/pesquisar/pesquisa_cliente_aparelho.php">Ver mais</a>
            </div>
          </div>

          <div class="align-items-center">
            <div class="" style="margin-top: 2em">
              <p>Aparelhos</p>
              <table class="table table-bordered table-hover text-center">
                <tr class="bg bg-primary text-white text-center">
                  <td>Modelo</td>
                  <td>Marca</td>
                  <td>Numero</td>
                  <td>Descricao</td>
                </tr>

                <?php
                $pesquisa = $conexao->query("SELECT * FROM eletronico INNER JOIN cliente_eletronico ON cliente_eletronico.eletronico_id_eletronico = eletronico.id_eletronico 
                INNER JOIN cliente ON cliente.id_cliente = cliente_eletronico.cliente_id_cliente  
                INNER JOIN login ON cliente.login_id_login = login.id_login WHERE cliente.login_id_login = $id_session LIMIT 5");
                while ($resultado = $pesquisa->fetch()) {
                  $modelo = $resultado['modelo'];
                  $marca = $resultado['marca'];
                  $numero = $resultado['numero'];
                  $descricao = $resultado['descricao'];
                  $id = $resultado['id_eletronico'];

                ?>

                  <tr class="text-center">
                    <td>
                      <?= $modelo ?>
                    </td>
                    <td>
                      <?= $marca ?>
                    </td>
                    <td>
                      <?= $numero ?>
                    </td>
                    <td>
                      <?= $descricao ?>
                    </td>

                  </tr>
                  </tbody>
                <?php
                }
                ?>
              </table>
              <a href="pages/pesquisar/pesquisa_aparelho.php">Ver mais</a>
            </div>
          </div>

          <div class="align-items-center">
            <div class="" style="margin-top: 2em">
              <p>Reparo</p>
              <table class="table table-bordered table-hover text-center">
                <tr class="bg bg-primary text-white text-center">
                  <th>Data Recebimento</th>
                  <th>Data Entrega</th>
                  <th>Observacao</th>
                  <th>Valor Total</th>
                  <th>Status</th>
                  <th>Modelo</th>
                  <th>Marca</th>
                  <th>Numero</th>
                </tr>
                <?php
                // Revelar os dados do db
                $pesquisa = $conexao->query("SELECT * FROM `reparo` INNER JOIN statu ON reparo.status_id_status = statu.id_status 
                INNER JOIN tecnico  ON reparo.tecnico_id_tecnico = tecnico.id_tecnico INNER JOIN eletronico ON reparo.eletronico_id_eletronico = eletronico.id_eletronico 
                INNER JOIN endereco ON tecnico.endereco_id_endereco = endereco.id_endereco INNER JOIN cliente_eletronico ON cliente_eletronico.eletronico_id_eletronico = eletronico.id_eletronico 
                INNER JOIN cliente ON cliente.id_cliente = cliente_eletronico.cliente_id_cliente INNER JOIN login ON cliente.login_id_login = login.id_login WHERE cliente.login_id_login = $id_session LIMIT 5 ");
                while ($linha = $pesquisa->fetch()) {
                  $id = $linha['id_reparo'];
                  //Mudar para a data BR
                  $data1 = $linha['data_recebimento'];
                  $data_recebimento = date('d/m/Y', strtotime($data1));
                  //Mudar para a data BR
                  $data3 = $linha['data_entrega'];
                  $data_entrega = date('d/m/Y', strtotime($data3));
                  $observacao = $linha['observacao'];
                  $valor_total = $linha['valor_total'];
                  $nome = $linha['nome_tecnico'];

                  $nome_status = $linha['nome_status'];
                  $modelo = $linha['modelo'];
                  $marca = $linha['marca'];
                  $numero = $linha['numero'];
                ?>

                  <tr class="text-center">
                    <td>
                      <?= $data_recebimento ?>
                    </td>
                    <td>
                      <?= $data_entrega ?>
                    </td>
                    <td>
                      <?= $observacao ?>
                    </td>
                    <td>
                      <?= $valor_total ?>
                    </td>
                    <td>
                      <?= $nome_status ?>
                    </td>
                    <td>
                      <?= $modelo ?>
                    </td>
                    <td>
                      <?= $marca ?>
                    </td>
                    <td>
                      <?= $numero ?>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </table>
              <a href="pages/pesquisar/pesquisa_reparo.php">Ver mais</a>
            </div>
          </div>

          <div class="align-items-center">
            <div class="" style="margin-top: 2em">
              <p>Tecnico</p>
              <table class="table table-bordered table-hover text-center">
                <tr class="bg bg-primary text-white text-center">
                  <td>Nome</td>
                  <td>Telefone</td>
                  <td>CEP</td>
                  <td>Cidade</td>
                  <td>UF</td>
                  <td>Bairro</td>
                  <td>Rua</td>
                  <td>Complemento</td>
                </tr>

                <?php
                // Revelar os dados do db
                $pesquisa = $conexao->query("SELECT * FROM tecnico INNER JOIN endereco ON tecnico.endereco_id_endereco = endereco.id_endereco 
                INNER JOIN login ON tecnico.login_id_login = login.id_login WHERE tecnico.login_id_login = $id_session LIMIT 5");
                while ($resultado = $pesquisa->fetch()) {
                  $nome = $resultado['nome_tecnico'];
                  $telefone = $resultado['telefone_tecnico'];
                  $cep = $resultado['cep'];
                  $cidade = $resultado['cidade'];
                  $uf = $resultado['uf'];
                  $bairro = $resultado['bairro'];
                  $rua = $resultado['rua'];
                  $complemento = $resultado['complemento'];
                ?>

                  <tr class="text-center">
                    <td>
                      <?= $nome ?>
                    </td>
                    <td>
                      <?= $telefone ?>
                    </td>
                    <td>
                      <?= $cep ?>
                    </td>
                    <td>
                      <?= $cidade ?>
                    </td>
                    <td>
                      <?= $uf ?>
                    </td>
                    <td>
                      <?= $bairro ?>
                    </td>
                    <td>
                      <?= $rua ?>
                    </td>
                    <td>
                      <?= $complemento ?>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </table>
              <a href="pages/pesquisar/pesquisa_tecnico.php">Ver mais</a>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
      <script src="../dist/admin4b.min.js" type="text/javascript"></script>
      <script src="assets/js/docs.js"></script>

      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>