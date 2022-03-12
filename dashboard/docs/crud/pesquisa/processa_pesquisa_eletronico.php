<?php 
include_once "conexao.php";

$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada

$resultado_user = $conexao->query('SELECT * FROM  eletronico WHERE modelo AND marca LIKE "%' . $usuarios . '%" ;');
if(($resultado_user) AND ($resultado_user->fetchColumn() != 0 )){
	while($row_user = $resultado_user->fetch(PDO::FETCH_ASSOC)){
		echo "<li>".$row_user['marca'].$row_user['modelo']."</li>";
	}
}else{
	echo "Nenhum usuário encontrado ...";
}