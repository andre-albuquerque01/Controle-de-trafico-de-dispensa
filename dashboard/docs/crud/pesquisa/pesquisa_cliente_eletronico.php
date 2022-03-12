<?php
/*
session_start();
$id = $_SESSION['session_id'];
include_once 'conexao.php';
if (isset($_POST['pesquisa']) != null) {
    $consulta1 = $conexao->query('SELECT * FROM cliente_eletronico INNER JOIN cliente ON cliente.id_cliente = cliente_eletronico.cliente_id_cliente 
        INNER JOIN eletronico ON eletronico.id_eletronico = cliente_eletronico.eletronico_id_eletronico INNER JOIN endereco ON cliente.endereco_id_endereco = endereco.id_endereco
        WHERE $id AND cliente.nome_completo LIKE "%' . $_POST['pesquisa'] . '%";');
    while ($resultado = $consulta1->fetch()) {
        echo $resultado['nome_completo'] . ", ";
        echo $resultado['telefone_celular'] . ", ";
        echo $resultado['telefone_contato'] . ".<br>";
        echo "Endereço: ";
        echo $resultado['cep'] . ", ";
        echo $resultado['cidade'] . ", ";
        echo $resultado['uf'] . ", ";
        echo $resultado['bairro'] . ", ";
        echo $resultado['rua'] . ", ";
        echo $resultado['complemento'] . ".<br>";
        echo $resultado['modelo'];
        echo $resultado['marca'];
        echo $resultado['numero'];
        echo $resultado['descricao'];
    }
}*/
?>

<body>
		<h1>Pesquisar Usuários</h1>
		<form method="POST" id="form-pesquisa" action="">
			<label>Pesquisar: </label>
			<input type="text" name="pesquisa" id="pesquisa" placeholder="Digite o nome do usuário">
		</form>
		
		<ul class="resultado">
		
		</ul>
		
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script type="text/javascript" src="personalizado2.js"></script>
	</body> 

<!-- Pesquisa cliente
<?php
/*
include_once 'conexao.php';

if (isset($_POST['pesquisa'])) {
    if (isset($_POST['pesquisa']) != null) {
        $consulta = $conexao->query('SELECT * FROM cliente INNER JOIN endereco ON cliente.endereco_id_endereco = endereco.id_endereco AND nome_completo LIKE "%' . $_POST['pesquisa'] . '%";');
    } else {
        $consulta = $conexao->query('SELECT * FROM cliente INNER JOIN endereco ON cliente.endereco_id_endereco = endereco.id_endereco');
    }
    while ($sql = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo $sql['nome_completo'] . ", ";
        echo $sql['telefone_celular'] . ", ";
        echo $sql['telefone_contato'] . ".<br>";
        echo "Endereço: ";
        echo $sql['cep'] . ", ";
        echo $sql['cidade'] . ", ";
        echo $sql['uf'] . ", ";
        echo $sql['bairro'] . ", ";
        echo $sql['rua'] . ", ";
        echo $sql['complemento'] . ".<br>";
    }
}*/
?>

<form action="" method="post">
    <p>Pesquisar:</p>
    <input type="text" name="pesquisa" id="pesquisa">
    <input type="submit" value="Pesquisar">
</form> -->