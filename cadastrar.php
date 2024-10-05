<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome'])); //trim serve para tirar o espaço do inicio e fim da string e mysqli_real_escape_string serve para limpar a string que, no caso, será enviada ao banco de dados. Essa função ajuda na prevenção de SQL Injection, pois não deixa que alguns caracteres como \n, ', ", entre outros qubrem sua query ou mesmo cheguem no seu BD e assim cause algum estrago.//

$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
//função MD5 para criptografar a senha//

$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "select count(*) as total from usuario where usuario = '$usuario'";
//O select count verifica o número de linhas (conta as linhas) não nulas dentro do count que você quer fazer!//
$result = mysqli_query($conexao, $sql);
//O mysqli_query é usado para executar um comando no seu SQL através do PHP, nele você passa a sua conexão( $conexao ) e a query a ser executada( $query ). Ou seja, através dele você vai inserir dados no seu banco de dados, ou alterar excluir e fazer consultas.//
$row = mysqli_fetch_assoc($result);
//A função mysqli_fetch_assoc() é usada para retornar uma matriz associativa representando a próxima linha no conjunto de resultados representado pelo parâmetro result , aonde cada chave representa o nome de uma coluna do conjunto de resultados.//
if ($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}//Verificação do cadastro//

$sql = "INSERT INTO usuario (nome, usuario, senha, data_cadastro) VALUES ('$nome', '$usuario', '$senha', NOW())";

if ($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}// o === siginifica igual e do mesmo tipo.

$conexao->close();

header('Location: cadastro.php');
exit;
