<?php 
include_once "conexao.php";

$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada

$resultado_user = $conexao->query('SELECT * FROM `reparo` INNER JOIN statu ON reparo.status_id_status = statu.id_status INNER JOIN tecnico ON reparo.tecnico_id_tecnico = tecnico.id_tecnico 
INNER JOIN eletronico ON reparo.eletronico_id_eletronico = eletronico.id_eletronico 
INNER JOIN endereco ON tecnico.endereco_id_endereco = endereco.id_endereco WHERE data_entrega and nome_status and marca and modelo LIKE "%' . $usuarios . '%" ;');
if(($resultado_user) AND ($resultado_user->fetchColumn() != 0 )){
	while($row_user = $resultado_user->fetch(PDO::FETCH_ASSOC)){
		echo "<li>".$row_user['data_entrega'].$row_user['nome_status'].$row_user['marca'].$row_user['modelo']."</li>";
	}
}else{
	echo "Nenhum usuário encontrado ...";
}