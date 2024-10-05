<?php
session_start();
include('conexao.php');// comunicação da sessão com outra página que é a conexao.php

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}// a condição acima é: se o campo via post usuário for vazio (|| siguinifica OU) ou o campo via POST senha
// tambem for vazio quero que retorne para index.php e tambem protegendo de outro usuário acessar sem logar//
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
//query fazendo verificação no banco se existe o usuarios e sennha, md5 e uma forma de criptografar dua senha//
$query = "select nome from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);
//consulta se login e senha foi verdadeira ou falsa//
$row = mysqli_num_rows($result);

if($row == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['nome'] = $usuario_bd['nome'];
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
?>