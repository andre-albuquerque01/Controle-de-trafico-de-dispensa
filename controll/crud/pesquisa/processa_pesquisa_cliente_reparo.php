<?php 
include_once "conexao.php";

$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada

$resultado_user = $conexao->query('SELECT * FROM cliente_eletronico INNER JOIN cliente ON cliente.id_cliente = cliente_eletronico.cliente_id_cliente 
INNER JOIN eletronico ON eletronico.id_eletronico = cliente_eletronico.eletronico_id_eletronico INNER JOIN endereco ON cliente.endereco_id_endereco = endereco.id_endereco
WHERE  cliente.nome_completo AND eletronico.modelo AND eletronico.marca LIKE "%' . $usuarios . '%" ;');
if(($resultado_user) AND ($resultado_user->fetchColumn() != 0 )){
	while($row_user = $resultado_user->fetch(PDO::FETCH_ASSOC)){
		echo "<li>".$row_user['nome_completo'].$row_user['modelo'].$row_user['marca']."</li>";
	}
}else{
	echo "Nenhum usuário encontrado ...";
}